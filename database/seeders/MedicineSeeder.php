<?php

namespace Database\Seeders;

use App\Models\Medicine;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds
     */
    public function run(): void
    {
        $medicines = [
            [
                'name' => 'Paracetamol 500mg Tablet - Pereda Sakit Kepala dan Demam',
                'type' => 'tablet',
                'description' => 'Paracetamol 500mg adalah pilihan utama untuk meredakan berbagai jenis nyeri seperti sakit kepala, sakit gigi, nyeri otot, dan menurunkan demam. Produk ini bekerja cepat dan efektif dalam mengatasi gejala flu dan demam ringan hingga sedang. Sangat aman dikonsumsi dengan dosis yang tepat, sehingga ideal untuk penggunaan sehari-hari.',
                'price' => 5000,
                'stock' => 100,
                'image' => 'paracetamol.jpg',
                'created_at' => now(),
            ],
            [
                'name' => 'Amoxilin 250mg Kapsul - Antibiotik Untuk Infeksi Bakteri',
                'type' => 'kapsul',
                'description' => 'Amoxilin 250mg adalah antibiotik yang digunakan untuk mengobati berbagai infeksi bakteri, termasuk infeksi saluran pernapasan, infeksi telinga, dan infeksi kulit. Produk ini bekerja dengan cara menghentikan pertumbuhan bakteri, membantu tubuh melawan infeksi dengan cepat dan efektif. Penggunaan harus sesuai dengan resep dokter.',
                'price' => 10000,
                'stock' => 50,
                'image' => 'amoxilin.jpg',
                'created_at' => now(),
            ],
            [
                'name' => 'OBH Sirup 100ml - Obat Batuk Herbal yang Ampuh',
                'type' => 'sirup',
                'description' => 'OBH Sirup 100ml adalah obat batuk yang terbuat dari bahan-bahan herbal yang telah terbukti secara klinis meredakan batuk berdahak maupun tidak berdahak. Dengan rasa yang nyaman di tenggorokan, sirup ini cocok untuk semua kalangan usia. Konsumsi secara rutin untuk hasil maksimal dalam meredakan gejala batuk.',
                'price' => 15000,
                'stock' => 3,
                'image' => 'obh.jpg',
                'created_at' => now(),
            ],
            [
                'name' => 'Antimo Sachet 50mg - Obat Anti Mabuk dan Diare',
                'type' => 'serbuk',
                'description' => 'Antimo Sachet 50mg adalah obat yang dikenal ampuh mengatasi mabuk perjalanan dan diare. Bentuk serbuknya yang praktis memudahkan penggunaan di mana saja. Obat ini cepat meredakan rasa mual dan membantu mengatasi masalah pencernaan saat dalam perjalanan jauh.',
                'price' => 20000,
                'stock' => 20,
                'image' => 'antimo.jpg',
                'created_at' => now(),
            ],
            [
                'name' => 'Panadol 500mg Tablet - Pereda Nyeri Perut dan Sakit Kepala',
                'type' => 'tablet',
                'description' => 'Panadol 500mg merupakan pilihan populer untuk meredakan nyeri perut, sakit kepala, serta berbagai jenis nyeri lainnya. Produk ini bekerja cepat dalam menurunkan demam dan mengurangi rasa tidak nyaman yang diakibatkan oleh nyeri ringan hingga sedang. Aman dikonsumsi sesuai anjuran dosis.',
                'price' => 25000,
                'stock' => 10,
                'image' => 'panadol.jpg',
                'created_at' => now(),
            ],
            [
                'name' => 'Amoxicillin 500mg Kapsul - Antibiotik Spektrum Luas',
                'type' => 'kapsul',
                'description' => 'Amoxicillin 500mg adalah antibiotik spektrum luas yang digunakan untuk mengatasi berbagai infeksi bakteri, seperti infeksi saluran kemih, infeksi kulit, serta infeksi pernapasan. Obat ini bekerja efektif dengan menghentikan pertumbuhan bakteri penyebab infeksi. Penggunaan harus berdasarkan resep dokter.',
                'price' => 30000,
                'stock' => 15,
                'image' => 'amoxicillin.jpg',
                'created_at' => now(),
            ],
            [
                'name' => 'Ibuprofen 400mg Tablet - Anti-Inflamasi dan Pereda Nyeri',
                'type' => 'tablet',
                'description' => 'Ibuprofen 400mg adalah obat anti-inflamasi non-steroid (NSAID) yang sangat efektif meredakan nyeri dan mengurangi peradangan. Cocok untuk mengatasi nyeri akibat cedera, sakit gigi, nyeri sendi, serta menurunkan demam. Produk ini aman dikonsumsi dalam jangka pendek sesuai anjuran.',
                'price' => 25000,
                'stock' => 25,
                'image' => 'ibuprofen.jpg',
                'created_at' => now(),
            ],
            [
                'name' => 'Vitamin C 500mg Tablet - Suplemen untuk Meningkatkan Daya Tahan Tubuh',
                'type' => 'tablet',
                'description' => 'Vitamin C 500mg merupakan suplemen yang penting untuk meningkatkan sistem imun tubuh. Selain membantu mencegah berbagai penyakit, vitamin C juga mendukung kesehatan kulit, mempercepat penyembuhan luka, dan berperan penting dalam penyerapan zat besi. Konsumsi rutin untuk menjaga kesehatan optimal.',
                'price' => 15000,
                'stock' => 30,
                'image' => 'vitamin_c.jpg',
                'created_at' => now(),
            ],
            [
                'name' => 'Cough Syrup 100ml - Sirup Batuk dengan Rasa yang Menyenangkan',
                'type' => 'sirup',
                'description' => 'Cough Syrup 100ml adalah solusi cepat untuk mengatasi batuk kering maupun berdahak. Formulanya yang ringan namun efektif membantu mengurangi iritasi di tenggorokan dan meredakan gejala batuk dengan nyaman. Rasa sirup yang menyenangkan menjadikannya favorit bagi anak-anak maupun dewasa.',
                'price' => 18000,
                'stock' => 12,
                'image' => 'cough_syrup.jpg',
                'created_at' => now(),
            ],
            [
                'name' => 'Antibiotic Powder 100mg - Antibiotik dalam Bentuk Serbuk untuk Luka Infeksi',
                'type' => 'serbuk',
                'description' => 'Antibiotic Powder 100mg merupakan antibiotik topikal dalam bentuk serbuk yang digunakan untuk mengobati infeksi kulit dan luka terbuka. Obat ini bekerja efektif melawan bakteri penyebab infeksi dengan aplikasi langsung pada luka. Ideal untuk penanganan infeksi ringan hingga sedang.',
                'price' => 35000,
                'stock' => 8,
                'image' => 'antibiotic_powder.jpg',
                'created_at' => now(),
            ],
            [
                'name' => 'Omeprazole 20mg Kapsul - Obat Maag dan Refluks Asam Lambung',
                'type' => 'kapsul',
                'description' => 'Omeprazole 20mg digunakan untuk mengatasi masalah lambung seperti maag, gastritis, dan refluks asam. Obat ini bekerja dengan menurunkan produksi asam lambung, memberikan perlindungan terhadap lapisan lambung, dan mengurangi rasa sakit serta sensasi terbakar di dada.',
                'price' => 25000,
                'stock' => 35,
                'image' => 'omeprazole.jpg',
                'created_at' => now(),
            ],
            [
                'name' => 'Dextromethorphan Sirup 100ml - Obat Batuk Kering Efektif',
                'type' => 'sirup',
                'description' => 'Dextromethorphan Sirup 100ml adalah obat batuk kering yang cepat meredakan batuk tanpa dahak. Kandungannya bekerja dengan mengurangi refleks batuk, memberikan kelegaan pada tenggorokan dan memungkinkan tidur yang lebih nyaman.',
                'price' => 12000,
                'stock' => 20,
                'image' => 'dextromethorphan.jpg',
                'created_at' => now(),
            ],
            [
                'name' => 'Cetirizine 10mg Tablet - Antihistamin untuk Alergi Hidung dan Kulit',
                'type' => 'tablet',
                'description' => 'Cetirizine 10mg adalah antihistamin yang efektif dalam mengatasi berbagai jenis alergi seperti alergi makanan, debu, serbuk sari, dan gigitan serangga. Obat ini mengurangi gejala gatal, ruam, serta hidung tersumbat, dengan efek samping minimal kantuk.',
                'price' => 18000,
                'stock' => 50,
                'image' => 'cetirizine.jpg',
                'created_at' => now(),
            ],
            [
                'name' => 'Hydrocortisone 1% gel - gel Anti-Peradangan untuk Kulit',
                'type' => 'gel',
                'description' => 'Hydrocortisone 1% gel adalah gel anti-peradangan yang digunakan untuk mengobati berbagai kondisi kulit seperti dermatitis, eksim, dan ruam. gel ini bekerja dengan mengurangi pembengkakan, kemerahan, dan rasa gatal akibat alergi atau iritasi.',
                'price' => 35000,
                'stock' => 15,
                'image' => 'hydrocortisone.jpg',
                'created_at' => now(),
            ],
            [
                'name' => 'Salbutamol 2mg Tablet - Obat Asma dan Sesak Napas',
                'type' => 'tablet',
                'description' => 'Salbutamol 2mg digunakan untuk meredakan gejala asma seperti sesak napas, dada terasa berat, dan batuk yang diakibatkan oleh penyempitan saluran napas. Obat ini bekerja dengan cepat untuk melebarkan saluran udara, memudahkan pernapasan.',
                'price' => 22000,
                'stock' => 25,
                'image' => 'salbutamol.jpg',
                'created_at' => now(),
            ],
            [
                'name' => 'Metformin 500mg Tablet - Pengobatan untuk Diabetes Tipe 2',
                'type' => 'tablet',
                'description' => 'Metformin 500mg adalah obat yang digunakan untuk mengontrol kadar gula darah pada pasien dengan diabetes tipe 2. Metformin membantu tubuh menggunakan insulin dengan lebih efektif dan menurunkan kadar gula darah, ideal untuk perawatan jangka panjang.',
                'price' => 30000,
                'stock' => 20,
                'image' => 'metformin.jpg',
                'created_at' => now(),
            ],
            [
                'name' => 'Lansoprazole 30mg Kapsul - Perlindungan Asam Lambung dan Maag Kronis',
                'type' => 'kapsul',
                'description' => 'Lansoprazole 30mg merupakan obat yang bekerja menurunkan produksi asam lambung secara efektif untuk menangani gangguan seperti maag kronis dan esofagitis. Obat ini direkomendasikan bagi pasien dengan keluhan perut yang berulang serta refluks asam lambung.',
                'price' => 45000,
                'stock' => 10,
                'image' => 'lansoprazole.jpg',
                'created_at' => now(),
            ],
            [
                'name' => 'Zinc 50mg Tablet - Suplemen Mineral untuk Imunitas dan Kesehatan Kulit',
                'type' => 'tablet',
                'description' => 'Zinc 50mg adalah suplemen penting untuk mendukung sistem kekebalan tubuh, mempercepat penyembuhan luka, serta menjaga kesehatan kulit. Suplemen ini juga berperan dalam metabolisme tubuh dan menjaga kesehatan sistem reproduksi.',
                'price' => 20000,
                'stock' => 50,
                'image' => 'zinc.jpg',
                'created_at' => now(),
            ],
            [
                'name' => 'Vitamin D3 1000IU Tablet - Suplemen untuk Tulang dan Kesehatan Jantung',
                'type' => 'tablet',
                'description' => 'Vitamin D3 1000IU adalah suplemen penting yang mendukung penyerapan kalsium, menjaga kesehatan tulang, dan mencegah osteoporosis. Selain itu, vitamin ini juga berperan penting dalam menjaga kesehatan jantung dan sistem kekebalan tubuh.',
                'price' => 35000,
                'stock' => 35,
                'image' => 'vitamin_d3.jpg',
                'created_at' => now(),
            ],
            [
                'name' => 'Diazepam 5mg Tablet - Obat Penenang untuk Gangguan Kecemasan',
                'type' => 'tablet',
                'description' => 'Diazepam 5mg adalah obat penenang yang digunakan untuk mengatasi gangguan kecemasan, kejang otot, dan masalah tidur. Obat ini bekerja dengan menenangkan sistem saraf pusat, memberikan efek relaksasi yang cepat.',
                'price' => 28000,
                'stock' => 20,
                'image' => 'diazepam.jpg',
                'created_at' => now(),
            ],
            [
                'name' => 'Furosemide 40mg Tablet - Diuretik untuk Mengatasi Retensi Cairan',
                'type' => 'tablet',
                'description' => 'Furosemide 40mg adalah obat diuretik yang membantu tubuh mengeluarkan kelebihan cairan yang menumpuk, sering digunakan pada kondisi seperti gagal jantung, penyakit ginjal, dan tekanan darah tinggi. Obat ini membantu mencegah pembengkakan dan mengurangi tekanan pada jantung.',
                'price' => 32000,
                'stock' => 25,
                'image' => 'furosemide.jpg',
                'created_at' => now(),
            ],
            [
                'name' => 'Levothyroxine 50mcg Tablet - Pengganti Hormon untuk Hipotiroidisme',
                'type' => 'tablet',
                'description' => 'Levothyroxine 50mcg adalah pengganti hormon tiroid yang digunakan untuk mengobati hipotiroidisme, kondisi di mana kelenjar tiroid tidak memproduksi cukup hormon. Obat ini membantu mengembalikan energi, metabolisme, dan suhu tubuh ke tingkat normal.',
                'price' => 23000,
                'stock' => 18,
                'image' => 'levothyroxine.jpg',
                'created_at' => now(),
            ],
            [
                'name' => 'Clotrimazole 1% gel - Obat Anti-Jamur untuk Infeksi Kulit',
                'type' => 'gel',
                'description' => 'Clotrimazole 1% gel adalah obat topikal yang efektif melawan infeksi jamur pada kulit seperti tinea, kurap, dan kandidiasis. Obat ini membantu meredakan rasa gatal, kemerahan, serta mencegah penyebaran infeksi.',
                'price' => 45000,
                'stock' => 12,
                'image' => 'clotrimazole.jpg',
                'created_at' => now(),
            ],
            [
                'name' => 'Bromhexine Sirup 100ml - Sirup Peluruh Dahak untuk Batuk Berdahak',
                'type' => 'sirup',
                'description' => 'Bromhexine Sirup 100ml adalah obat yang digunakan untuk meredakan batuk berdahak dengan cara mengencerkan dahak, sehingga memudahkan pengeluarannya dari saluran napas. Cocok digunakan untuk anak-anak dan dewasa.',
                'price' => 18000,
                'stock' => 30,
                'image' => 'bromhexine.jpg',
                'created_at' => now(),
            ],
            [
                'name' => 'Ibuprofen 200mg Tablet - Obat Anti-Inflamasi Non-Steroid (NSAID)',
                'type' => 'tablet',
                'description' => 'Ibuprofen 200mg adalah obat anti-inflamasi non-steroid (NSAID) yang digunakan untuk mengurangi rasa sakit, peradangan, dan demam. Cocok untuk mengobati sakit kepala, nyeri otot, nyeri menstruasi, dan radang sendi.',
                'price' => 25000,
                'stock' => 45,
                'image' => 'ibuprofen.jpg',
                'created_at' => now(),
            ],
            [
                'name' => 'Aspirin 81mg Tablet - Obat Pencegah Penggumpalan Darah',
                'type' => 'tablet',
                'description' => 'Aspirin 81mg adalah obat yang digunakan sebagai pencegahan terhadap penggumpalan darah, terutama bagi penderita penyakit jantung dan stroke. Obat ini bekerja dengan mengurangi risiko penyumbatan pembuluh darah.',
                'price' => 27000,
                'stock' => 30,
                'image' => 'aspirin.jpg',
                'created_at' => now(),
            ],
            [
                'name' => 'Amoxicillin 500mg Kapsul - Antibiotik untuk Infeksi Bakteri',
                'type' => 'kapsul',
                'description' => 'Amoxicillin 500mg adalah antibiotik yang digunakan untuk mengobati berbagai infeksi bakteri, termasuk infeksi saluran pernapasan, kulit, telinga, dan saluran kemih. Obat ini efektif menghentikan pertumbuhan bakteri dalam tubuh.',
                'price' => 40000,
                'stock' => 25,
                'image' => 'amoxicillin.jpg',
                'created_at' => now(),
            ],
            [
                'name' => 'Methylprednisolone 4mg Tablet - Kortikosteroid untuk Mengurangi Peradangan',
                'type' => 'tablet',
                'description' => 'Methylprednisolone 4mg adalah obat kortikosteroid yang digunakan untuk mengurangi peradangan akibat gangguan seperti artritis, alergi, dan kondisi autoimun. Obat ini bekerja dengan menekan respon imun yang menyebabkan peradangan.',
                'price' => 37000,
                'stock' => 15,
                'image' => 'methylprednisolone.jpg',
                'created_at' => now(),
            ],
            [
                'name' => 'Simvastatin 20mg Tablet - Menurunkan Kadar Kolesterol Jahat',
                'type' => 'tablet',
                'description' => 'Simvastatin 20mg adalah obat yang digunakan untuk menurunkan kadar kolesterol LDL (jahat) dan trigliserida dalam darah, serta meningkatkan kolesterol HDL (baik). Cocok untuk pasien dengan risiko tinggi penyakit jantung.',
                'price' => 33000,
                'stock' => 40,
                'image' => 'simvastatin.jpg',
                'created_at' => now(),
            ],
            [
                'name' => 'Naproxen 250mg Tablet - Obat Pereda Nyeri dan Peradangan',
                'type' => 'tablet',
                'description' => 'Naproxen 250mg adalah obat anti-inflamasi non-steroid yang digunakan untuk mengurangi rasa sakit, pembengkakan, dan kekakuan yang disebabkan oleh radang sendi, nyeri otot, atau nyeri menstruasi.',
                'price' => 29000,
                'stock' => 30,
                'image' => 'naproxen.jpg',
                'created_at' => now(),
            ],
        ];

        foreach ($medicines as $medicine) {
            Medicine::create($medicine);
        }

        // for ($i = 0; $i < 5; $i++) {
        //    Medicine::create($medicines[$i]);
        // }
    }
}
