<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create default admin if not exists
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin Utama',
                'password' => bcrypt('admin123'),
            ]
        );

        // 2. Define 6 categories
        $categoriesData = [
            [
                'name' => 'Pakaian Pria',
                'icon' => '👕',
            ],
            [
                'name' => 'Pakaian Wanita',
                'icon' => '👗',
            ],
            [
                'name' => 'Elektronik & Gadget',
                'icon' => '📱',
            ],
            [
                'name' => 'Sepatu & Sandal',
                'icon' => '👟',
            ],
            [
                'name' => 'Kosmetik & Kecantikan',
                'icon' => '💄',
            ],
            [
                'name' => 'Perlengkapan Rumah',
                'icon' => '🏠',
            ],
        ];

        $categories = [];
        foreach ($categoriesData as $cat) {
            $categories[$cat['name']] = Category::updateOrCreate(
                ['slug' => Str::slug($cat['name'])],
                [
                    'name' => $cat['name'],
                    'icon' => $cat['icon'],
                    'is_active' => true,
                ]
            );
        }

        // 3. Define 20 products
        $productsData = [
            // Pakaian Pria
            [
                'category_name' => 'Pakaian Pria',
                'name' => 'Kaos Polos Cotton Combed 30s',
                'description' => 'Bahan kaos combed 30s original premium yang sangat adem, menyerap keringat, dan nyaman digunakan sehari-hari.',
                'price' => 45000,
                'shopee_url' => 'https://shopee.co.id',
                'tiktok_url' => 'https://tiktok.com',
            ],
            [
                'category_name' => 'Pakaian Pria',
                'name' => 'Kemeja Flannel Premium',
                'description' => 'Kemeja flanel lengan panjang dengan motif kotak-kotak modern, bahan semi-wool lembut tidak menerawang.',
                'price' => 120000,
                'shopee_url' => 'https://shopee.co.id',
                'tiktok_url' => null,
            ],
            [
                'category_name' => 'Pakaian Pria',
                'name' => 'Celana Chino Slimfit',
                'description' => 'Celana chino stretch katun tebal dan elastis, cocok untuk gaya kasual maupun formal kantor.',
                'price' => 150000,
                'shopee_url' => 'https://shopee.co.id',
                'tiktok_url' => 'https://tiktok.com',
            ],

            // Pakaian Wanita
            [
                'category_name' => 'Pakaian Wanita',
                'name' => 'Tunik Rayon Premium',
                'description' => 'Tunik panjang dengan motif estetik berbahan rayon viscose super adem dan jatuh di badan.',
                'price' => 85000,
                'shopee_url' => 'https://shopee.co.id',
                'tiktok_url' => 'https://tiktok.com',
            ],
            [
                'category_name' => 'Pakaian Wanita',
                'name' => 'Blouse Wanita Casual',
                'description' => 'Kemeja blouse korean style kekinian dengan lengan balon, cocok dipadu padankan dengan rok atau celana jeans.',
                'price' => 75000,
                'shopee_url' => 'https://shopee.co.id',
                'tiktok_url' => null,
            ],
            [
                'category_name' => 'Pakaian Wanita',
                'name' => 'Cardigan Rajut Oversize',
                'description' => 'Outer rajutan tebal rajut premium model longgar, hangat dan sangat trendi untuk outfit harian.',
                'price' => 95000,
                'shopee_url' => 'https://shopee.co.id',
                'tiktok_url' => 'https://tiktok.com',
            ],
            [
                'category_name' => 'Pakaian Wanita',
                'name' => 'Rok Plisket Premium',
                'description' => 'Rok plisket mayung dengan lipatan konsisten, pinggang full karet muat hingga ukuran jumbo.',
                'price' => 60000,
                'shopee_url' => 'https://shopee.co.id',
                'tiktok_url' => 'https://tiktok.com',
            ],

            // Elektronik & Gadget
            [
                'category_name' => 'Elektronik & Gadget',
                'name' => 'TWS Earphone Wireless Bluetooth 5.3',
                'description' => 'Earphone nirkabel suara bass mantap, latency rendah untuk game, dan baterai tahan hingga 20 jam penggunaan.',
                'price' => 189000,
                'shopee_url' => 'https://shopee.co.id',
                'tiktok_url' => 'https://tiktok.com',
            ],
            [
                'category_name' => 'Elektronik & Gadget',
                'name' => 'Powerbank Fast Charging 10000mAh',
                'description' => 'Powerbank slim berkapasitas besar dengan teknologi Power Delivery (PD) 22.5W aman dibawa ke pesawat.',
                'price' => 149000,
                'shopee_url' => 'https://shopee.co.id',
                'tiktok_url' => null,
            ],
            [
                'category_name' => 'Elektronik & Gadget',
                'name' => 'Charger Adapter GaN 65W',
                'description' => 'Kepala charger teknologi GaN mini dengan 3 port (2 Type-C, 1 USB-A) untuk cas laptop dan hp sekaligus.',
                'price' => 199000,
                'shopee_url' => 'https://shopee.co.id',
                'tiktok_url' => 'https://tiktok.com',
            ],
            [
                'category_name' => 'Elektronik & Gadget',
                'name' => 'Phone Holder Desktop Stand',
                'description' => 'Dudukan smartphone lipat yang kokoh dari bahan aluminium alloy, ketinggian dan sudut pandang bisa diatur.',
                'price' => 25000,
                'shopee_url' => 'https://shopee.co.id',
                'tiktok_url' => 'https://tiktok.com',
            ],

            // Sepatu & Sandal
            [
                'category_name' => 'Sepatu & Sandal',
                'name' => 'Sneakers Casual Unisex',
                'description' => 'Sepatu sneakers rajut breathable empuk dan ringan, sangat modis untuk olahraga maupun nongkrong.',
                'price' => 249000,
                'shopee_url' => 'https://shopee.co.id',
                'tiktok_url' => 'https://tiktok.com',
            ],
            [
                'category_name' => 'Sepatu & Sandal',
                'name' => 'Sandal Slop Spons Empuk',
                'description' => 'Sandal santai bahan karet EVA anti-slip dan anti-air, nyaman digunakan di dalam maupun di luar rumah.',
                'price' => 35000,
                'shopee_url' => 'https://shopee.co.id',
                'tiktok_url' => null,
            ],
            [
                'category_name' => 'Sepatu & Sandal',
                'name' => 'Sepatu Formal Kulit Sintetis',
                'description' => 'Sepatu oxford pantofel formal pria kulit sintetis berkualitas mengkilap, cocok untuk kondangan dan kerja.',
                'price' => 299000,
                'shopee_url' => 'https://shopee.co.id',
                'tiktok_url' => 'https://tiktok.com',
            ],

            // Kosmetik & Kecantikan
            [
                'category_name' => 'Kosmetik & Kecantikan',
                'name' => 'Lip Cream Matte Longlasting',
                'description' => 'Lip cream matte bertekstur ringan tahan hingga 16 jam, transferproof dengan warna-warna alami.',
                'price' => 59000,
                'shopee_url' => 'https://shopee.co.id',
                'tiktok_url' => 'https://tiktok.com',
            ],
            [
                'category_name' => 'Kosmetik & Kecantikan',
                'name' => 'Sunscreen SPF 50++ Gel',
                'description' => 'Tabir surya harian berbahan dasar air yang ringan dan dingin, tidak menyumbat pori-pori.',
                'price' => 65000,
                'shopee_url' => 'https://shopee.co.id',
                'tiktok_url' => null,
            ],
            [
                'category_name' => 'Kosmetik & Kecantikan',
                'name' => 'Serum Brightening Niacinamide 10%',
                'description' => 'Serum pencerah kulit wajah efektif memudarkan noda hitam dan meratakan warna kulit dalam 14 hari.',
                'price' => 89000,
                'shopee_url' => 'https://shopee.co.id',
                'tiktok_url' => 'https://tiktok.com',
            ],

            // Perlengkapan Rumah
            [
                'category_name' => 'Perlengkapan Rumah',
                'name' => 'Botol Minum Tumbler Estetik 1L',
                'description' => 'Tumbler stainless steel tahan panas dan dingin hingga 12 jam, dilengkapi dengan sedotan ramah lingkungan.',
                'price' => 49000,
                'shopee_url' => 'https://shopee.co.id',
                'tiktok_url' => 'https://tiktok.com',
            ],
            [
                'category_name' => 'Perlengkapan Rumah',
                'name' => 'Lampu Tidur LED Sensor Cahaya',
                'description' => 'Lampu malam mini hemat energi otomatis menyala saat gelap dan mati saat mendeteksi cahaya.',
                'price' => 15000,
                'shopee_url' => 'https://shopee.co.id',
                'tiktok_url' => null,
            ],
            [
                'category_name' => 'Perlengkapan Rumah',
                'name' => 'Sprei Kasur Halus Microtex',
                'description' => 'Sprei katun microtex super lembut, tidak luntur, dan dingin dengan berbagai pilihan motif estetik kamar.',
                'price' => 110000,
                'shopee_url' => 'https://shopee.co.id',
                'tiktok_url' => 'https://tiktok.com',
            ],
        ];

        foreach ($productsData as $index => $prod) {
            $cat = $categories[$prod['category_name']];
            Product::updateOrCreate(
                ['slug' => Str::slug($prod['name'])],
                [
                    'category_id' => $cat->id,
                    'name' => $prod['name'],
                    'description' => null,
                    'price' => null,
                    'sort_order' => $index + 1,
                    'shopee_url' => $prod['shopee_url'],
                    'tiktok_url' => $prod['tiktok_url'],
                    'is_active' => true,
                    'image' => null,
                ]
            );
        }
    }
}
