<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $foods = [
            [
                "name" => "Sate Puyuh",
                "slug" => "sate-puyuh",
                "image" => "images/menus/makanan/sate-puyuh.jpg",
                "price" => "3500",
                "stock" => "0",
                "category_id" => "1"
            ],
            [
                "name" => "Sate Ati Ampela",
                "slug" => "sate-ati-ampela",
                "image" => "images/menus/makanan/sate-ati-ampela.jpg",
                "price" => "5000",
                "stock" => "0",
                "category_id" => "1"
            ],
            [
                "name" => "Sate Brutu",
                "slug" => "sate-brutu",
                "image" => "images/menus/makanan/sate-brutu.jpg",
                "price" => "3000",
                "stock" => "10",
                "category_id" => "1"
            ],
            [
                "name" => "Sate Usus",
                "slug" => "sate-usus",
                "image" => "images/menus/makanan/sate-usus.jpg",
                "price" => "2000",
                "stock" => "10",
                "category_id" => "1"
            ],
            [
                "name" => "Sate 02 (Bekicot)",
                "slug" => "sate-bekicot",
                "image" => "images/menus/makanan/sate-bekicot.jpg",
                "price" => "2000",
                "stock" => "10",
                "category_id" => "1"
            ],
            [
                "name" => "Ceker Ayam Pedas",
                "slug" => "ceker-ayam-pedas",
                "image" => "images/menus/makanan/ceker-ayam-pedas.jpg",
                "price" => "1500",
                "stock" => "10",
                "category_id" => "1"
            ],
            [
                "name" => "Sayap Ayam Pedas",
                "slug" => "sayap-ayam-pedas",
                "image" => "images/menus/makanan/sayap-ayam-pedas.jpg",
                "price" => "3500",
                "stock" => "10",
                "category_id" => "1"
            ],
            [
                "name" => "Kepala Ayam",
                "slug" => "kepala-ayam",
                "image" => "images/menus/makanan/kepala-ayam.jpg",
                "price" => "3500",
                "stock" => "10",
                "category_id" => "1"
            ],
            [
                "name" => "Tempe Bacem",
                "slug" => "tempe-bacem",
                "image" => "images/menus/makanan/tempe-bacem.jpg",
                "price" => "1500",
                "stock" => "10",
                "category_id" => "1"
            ],
            [
                "name" => "Tahu Bacem",
                "slug" => "tahu-bacem",
                "image" => "images/menus/makanan/tahu-bacem.jpg",
                "price" => "1500",
                "stock" => "10",
                "category_id" => "1"
            ],
            [
                "name" => "Tahu Bakso",
                "slug" => "tahu-bakso",
                "image" => "images/menus/makanan/tahu-bakso.jpg",
                "price" => "3000",
                "stock" => "10",
                "category_id" => "1"
            ],
            [
                "name" => "Kornet",
                "slug" => "kornet",
                "image" => "images/menus/makanan/kornet.jpg",
                "price" => "3500",
                "stock" => "10",
                "category_id" => "1"
            ],
            [
                "name" => "Scallop",
                "slug" => "scallop",
                "image" => "images/menus/makanan/scallop.jpg",
                "price" => "3500",
                "stock" => "10",
                "category_id" => "1"
            ],
            [
                "name" => "Dumpling Ayam",
                "slug" => "dumpling-ayam",
                "image" => "images/menus/makanan/dumpling-ayam.jpg",
                "price" => "5000",
                "stock" => "10",
                "category_id" => "1"
            ],
            [
                "name" => "Dumpling Keju",
                "slug" => "dumpling-keju",
                "image" => "images/menus/makanan/dumpling-keju.jpg",
                "price" => "5000",
                "stock" => "10",
                "category_id" => "1"
            ],
            [
                "name" => "Bakso Ayam",
                "slug" => "bakso-ayam",
                "image" => "images/menus/makanan/bakso-ayam.jpg",
                "price" => "3500",
                "stock" => "10",
                "category_id" => "1"
            ],
            [
                "name" => "Fishbar Mini",
                "slug" => "fishbar-mini",
                "image" => "images/menus/makanan/fishbar-mini.jpg",
                "price" => "3500",
                "stock" => "10",
                "category_id" => "1"
            ],
            [
                "name" => "Sosis Ayam",
                "slug" => "sosis-ayam",
                "image" => "images/menus/makanan/sosis-ayam.jpg",
                "price" => "3500",
                "stock" => "10",
                "category_id" => "1"
            ],
            [
                "name" => "Tofu",
                "slug" => "tofu",
                "image" => "images/menus/makanan/tofu.jpg",
                "price" => "3500",
                "stock" => "10",
                "category_id" => "1"
            ],
            [
                "name" => "Fishball",
                "slug" => "fishball",
                "image" => "images/menus/makanan/fishball.jpg",
                "price" => "3500",
                "stock" => "10",
                "category_id" => "1"
            ],
            [
                "name" => "Siomay Ayam",
                "slug" => "siomay-ayam",
                "image" => "images/menus/makanan/siomay-ayam.jpg",
                "price" => "3500",
                "stock" => "10",
                "category_id" => "1"
            ],
            [
                "name" => "Chikuwa",
                "slug" => "chikuwa",
                "image" => "images/menus/makanan/chikuwa.jpg",
                "price" => "3500",
                "stock" => "10",
                "category_id" => "1"
            ],
            [
                "name" => "Sosis Sapi",
                "slug" => "sosis-sapi",
                "image" => "images/menus/makanan/sosis-sapi.jpg",
                "price" => "10000",
                "stock" => "10",
                "category_id" => "1"
            ],
        ];
        $drinks = [
            [
                "name" => "Wedang Jahe",
                "slug" => "wedang-jahe",
                "image" => "images/menus/minuman/wedang-jahe.jpg",
                "price" => "3000",
                "stock" => "0",
                "category_id" => "2"
            ],
            [
                "name" => "Wedang Ronde",
                "slug" => "wedang-ronde",
                "image" => "images/menus/minuman/wedang-ronde.jpg",
                "price" => "3000",
                "stock" => "0",
                "category_id" => "2"
            ],
            [
                "name" => "Wedang Tape",
                "slug" => "wedang-tape",
                "image" => "images/menus/minuman/wedang-tape.jpg",
                "price" => "3000",
                "stock" => "10",
                "category_id" => "2"
            ],
            [
                "name" => "Bandrek",
                "slug" => "bandrek",
                "image" => "images/menus/minuman/bandrek.jpg",
                "price" => "3000",
                "stock" => "10",
                "category_id" => "2"
            ],
            [
                "name" => "Bajigur",
                "slug" => "bajigur",
                "image" => "images/menus/minuman/bajigur.jpg",
                "price" => "3000",
                "stock" => "10",
                "category_id" => "2"
            ],
            [
                "name" => "Sekoteng",
                "slug" => "sekoteng",
                "image" => "images/menus/minuman/sekoteng.jpg",
                "price" => "3000",
                "stock" => "10",
                "category_id" => "2"
            ],
            [
                "name" => "Teh Panas",
                "slug" => "teh-panas",
                "image" => "images/menus/minuman/teh-panas.jpg",
                "price" => "2000",
                "stock" => "10",
                "category_id" => "2"
            ],
            [
                "name" => "Kopi Tubruk",
                "slug" => "kopi-tubruk",
                "image" => "images/menus/minuman/kopi-tubruk.jpg",
                "price" => "3000",
                "stock" => "10",
                "category_id" => "2"
            ],
            [
                "name" => "Kopi Areng",
                "slug" => "kopi-areng",
                "image" => "images/menus/minuman/kopi-areng.jpg",
                "price" => "3000",
                "stock" => "10",
                "category_id" => "2"
            ],
            [
                "name" => "Kopi Ijo",
                "slug" => "kopi-ijo",
                "image" => "images/menus/minuman/kopi-ijo.jpg",
                "price" => "3000",
                "stock" => "10",
                "category_id" => "2"
            ],
            [
                "name" => "Es Teh",
                "slug" => "es-teh",
                "image" => "images/menus/minuman/es-teh.jpg",
                "price" => "3000",
                "stock" => "10",
                "category_id" => "2"
            ],
            [
                "name" => "Jeruk Panas",
                "slug" => "jeruk-panas",
                "image" => "images/menus/minuman/jeruk-panas.jpg",
                "price" => "3000",
                "stock" => "10",
                "category_id" => "2"
            ],
            [
                "name" => "Es Jeruk",
                "slug" => "es-jeruk",
                "image" => "images/menus/minuman/es-jeruk.jpg",
                "price" => "3000",
                "stock" => "10",
                "category_id" => "2"
            ],
        ];

        foreach ($foods as $key => $value) {
            Menu::create([
                "name" => $value["name"],
                "slug" => $value["slug"],
                "image" => $value["image"],
                "price" => $value["price"],
                "stock" => $value["stock"],
                "category_id" => $value["category_id"],
            ]);
        }
        foreach ($drinks as $key => $value) {
            Menu::create([
                "name" => $value["name"],
                "slug" => $value["slug"],
                "image" => $value["image"],
                "price" => $value["price"],
                "stock" => $value["stock"],
                "category_id" => $value["category_id"],
            ]);
        }
    }
}
