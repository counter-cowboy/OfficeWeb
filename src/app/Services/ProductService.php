<?php

namespace App\Services;

use App\Models\Image;
use App\Models\Keyvalue;
use App\Models\Product;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public static function product($row)
    {
        $discount = true;

        if ($row['zapretit_skidki_pri_prodaze_v_roznicu'] === 'нет') {
            $discount = false;
        }

        $price = str_replace(',', '.', $row['cena_cena_prodazi']);

        $product = Product::firstOrCreate([
            'external_code' => $row['vnesnii_kod'],
            'name' => $row['naimenovanie'],
            'description' => $row['opisanie'],
            'price' => $price,
            'discount' => $discount
        ]);
        return $product->id;
    }

    public static function image($row, $prodId): void
    {

        $imageUrls = explode(', ', $row['dop_pole_ssylki_na_foto']);

        /**
         *  Сохраняем изображения товара на диск
         */

        $imgPath = self::imageProductSave($imageUrls, $prodId);


        /**
         * Работаем с таблицей images - изображения упаковки сохраняем на диск
         */

        $pathToBoxFile =self::imagePackageSave($row, $prodId);

        /**
         * Работаем с таблицей images - изображения товара и упаковки заносим в БД
         */
        self::imagesSaveDb($imgPath, $pathToBoxFile, $prodId);
    }

    public static function keyvalue($row, $prodId): void
    {
        Keyvalue::firstOrCreate([
            'size' => $row['dop_pole_razmer'],
            'color' => $row['dop_pole_cvet'],
            'brand' => $row['dop_pole_brend'],
            'composition' => $row['dop_pole_sostav'],
            'quantity' => $row['dop_pole_kol_vo_v_upakovke'],
            'seo_title' => $row['dop_pole_seo_title'],
            'seo_h1' => $row['dop_pole_seo_h1'],
            'seo_description' => $row['dop_pole_seo_description'],
            'product_weight' => $row['dop_pole_ves_tovarag'],
            'product_width' => $row['dop_pole_sirinamm'],
            'product_height' => $row['dop_pole_vysotamm'],
            'product_length' => $row['dop_pole_dlinamm'],
            'package_weight' => $row['dop_pole_ves_upakovkig'],
            'package_width' => $row['dop_pole_sirina_upakovkimm'],
            'package_height' => $row['dop_pole_vysota_upakovkimm'],
            'package_length' => $row['dop_pole_dlina_upakovkimm'],
            'product_category' => $row['dop_pole_kategoriia_tovara'],
            'product_id' => $prodId
        ]);

    }

    public static function imageProductSave($imageUrls, $prodId): array
    {
        $imgPath = [];

        foreach ($imageUrls as $img) {


            if (!empty($img)) {
                $response = Http::get($img);

                if ($response->successful()) {
                    $originalFileName = basename($img);
                    $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
                    $nameImg = pathinfo($originalFileName, PATHINFO_FILENAME);
                    $randomName = uniqid() . '_' . rand(1, 100) . '_' . $nameImg . '.' . $extension;

                    $imgPath[] = $pathToFile = $randomName;

                    Storage::disk('public')
                        ->put($pathToFile, $response->body());
                } else {
                    $errorId = $prodId;
                    echo "Error product ID ${errorId}. Some images can be unreachable.<br>";
                }
            }
        }
        return $imgPath;

    }

    public static function imagePackageSave($row, $prodId): string
    {
        $imageBox = $row['dop_pole_ssylka_na_upakovku'];
        $responseBox = Http::get($imageBox);

        $pathToBoxFile = '';
        if ($responseBox->successful()) {

            $originalBoxName = basename($imageBox);
            $extensionBox = pathinfo($originalBoxName, PATHINFO_EXTENSION);
            $nameBoxImg = pathinfo($originalBoxName, PATHINFO_FILENAME);
            $randomBoxName = uniqid() . '_' . rand(1, 100) . '_' . $nameBoxImg . '.' . $extensionBox;
            $pathToBoxFile = $randomBoxName;

            Storage::disk('public')
                ->put($pathToBoxFile, $responseBox->body());
        } else {
            $errId = $prodId;
            echo "Error box image ID ${errId}";
        }
        return $pathToBoxFile;
    }

    public static function imagesSaveDb($imgPath, $pathToBoxFile, $prodId): void
    {
        $img_1 = $imgPath[0] ?? '';
        $img_2 = $imgPath[1] ?? '';
        $img_3 = $imgPath[2] ?? '';
        $img_4 = $imgPath[3] ?? '';


        $imgFinal = Image::firstOrCreate([
            'image_box' => $pathToBoxFile,
            'product_id' => $prodId,
            'image_1' => $img_1,
            'image_2' => $img_2,
            'image_3' => $img_3,
            "image_4" => $img_4
        ]);

    }

}
