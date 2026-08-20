<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$settings = [
    'sejarah_narasi' => '<p class="text-xl md:text-2xl leading-relaxed text-slate-800 font-semibold mb-8"><span class="text-4xl text-[#1e3a8a]">D</span>ahulu Desa Kersagalih bernama Desa Campaka. Desa Campaka berdiri kurang lebih pada abad ke-19 yaitu sekitar tahun 1923, dengan Kepala Desa yang pertama yaitu Bapak Jayadisastra (Alm).</p><p class="text-lg md:text-xl leading-relaxed text-slate-600 mb-8">Seiring berjalannya waktu Desa Campaka pun berganti nama menjadi Desa Kersagalih. Dari kata <strong class="text-slate-800">‘Campaka’</strong> berubah menjadi <strong class="text-[#1e3a8a]">‘Kersagalih’</strong> sama halnya dengan kata ‘Insun Medal’ menjadi ‘Sumedang’.</p><p class="text-lg md:text-xl leading-relaxed text-slate-600">Desa Kersagalih dahulu wilayahnya terbilang cukup luas sehingga dimekarkan menjadi empat desa yaitu Desa Mandalamekar dan Desa Mandalahurip di sebelah selatan yang menjadi bagian dari Kecamatan Jatiwaras, dan Desa Kertarahayu di sebelah Timur yang menjadi bagian dari Kecamatan Jatiwaras juga.</p>',
    'sejarah_kades_table' => '<table class="w-full text-left border-collapse"><thead class="bg-[#1e3a8a] text-white"><tr><th class="p-4 font-bold border border-[#1e3a8a]">No</th><th class="p-4 font-bold border border-[#1e3a8a]">Nama Kepala Desa</th><th class="p-4 font-bold border border-[#1e3a8a]">Masa Jabatan</th></tr></thead><tbody><tr class="bg-white"><td class="p-4 border border-slate-200 font-medium text-center">1</td><td class="p-4 border border-slate-200 font-bold text-slate-700">Bapak Jayadisastra (Alm)</td><td class="p-4 border border-slate-200 text-slate-600">1923 s/d 1930</td></tr><tr class="bg-slate-50"><td class="p-4 border border-slate-200 font-medium text-center">2</td><td class="p-4 border border-slate-200 font-bold text-slate-700">Bapak Sulaeman (Alm)</td><td class="p-4 border border-slate-200 text-slate-600">1931 s/d 1935</td></tr><tr class="bg-white"><td class="p-4 border border-slate-200 font-medium text-center">3</td><td class="p-4 border border-slate-200 font-bold text-slate-700">Bapak Sumadipraja (Alm)</td><td class="p-4 border border-slate-200 text-slate-600">1935 s/d 1947</td></tr><tr class="bg-slate-50"><td class="p-4 border border-slate-200 font-medium text-center">4</td><td class=\"p-4 border border-slate-200 font-bold text-slate-700\">Bapak Sasmita (Alm)</td><td class="p-4 border border-slate-200 text-slate-600">1947 s/d 1957</td></tr><tr class="bg-white"><td class="p-4 border border-slate-200 font-medium text-center">5</td><td class="p-4 border border-slate-200 font-bold text-slate-700">Bapak Suparman (Alm)</td><td class="p-4 border border-slate-200 text-slate-600">1958 s/d 1970</td></tr><tr class="bg-slate-50"><td class="p-4 border border-slate-200 font-medium text-center">6</td><td class="p-4 border border-slate-200 font-bold text-slate-700\">Bapak Emo Suganda (Alm)</td><td class="p-4 border border-slate-200 text-slate-600">1971 s/d 1980</td></tr><tr class="bg-white"><td class="p-4 border border-slate-200 font-medium text-center">7</td><td class="p-4 border border-slate-200 font-bold text-slate-700">Bapak D. Djudju Juhana (Alm)</td><td class="p-4 border border-slate-200 text-slate-600">1981 s/d 1999</td></tr><tr class="bg-slate-50"><td class="p-4 border border-slate-200 font-medium text-center">8</td><td class="p-4 border border-slate-200 font-bold text-slate-700\">Bapak Suryaman</td><td class="p-4 border border-slate-200 text-slate-600">2000 s/d 2008</td></tr><tr class="bg-white"><td class="p-4 border border-slate-200 font-medium text-center">9</td><td class="p-4 border border-slate-200 font-bold text-slate-700">Bapak Encam Supriatna</td><td class="p-4 border border-slate-200 text-slate-600">2008 s/d 2014</td></tr><tr class="bg-slate-50"><td class="p-4 border border-slate-200 font-medium text-center">10</td><td class="p-4 border border-slate-200 font-bold text-slate-700\">Bapak Asep Nurhasan</td><td class="p-4 border border-slate-200 text-slate-600\">2015 s/d 2021</td></tr><tr class="bg-white"><td class="p-4 border border-slate-200 font-medium text-center\">11</td><td class="p-4 border border-slate-200 font-bold text-slate-700">Bapak Dadi Suryadi, S.IP</td><td class="p-4 border border-slate-200 text-slate-600">2022 s/d Sekarang (Pjs)</td></tr></tbody></table>',
    'batas_utara' => 'Desa Ciwarak',
    'batas_selatan' => 'Desa Mandalamekar',
    'batas_timur' => 'Desa Kertarahayu',
    'batas_barat' => 'Desa Cibalong',
    'jarak_kecamatan' => '17',
    'jarak_kabupaten' => '35',
    'jarak_provinsi' => '160',
    'luas_total' => '980',
    'lahan_basah' => '85.97',
    'lahan_kering' => '362.02',
    'lahan_pemukiman' => '109.77',
    'lahan_hutan' => '24.56',
    'penduduk_total' => '5218',
    'penduduk_kk' => '1788',
    'penduduk_lk' => '2717',
    'penduduk_pr' => '2501'
];
foreach ($settings as $key => $value) {
    \App\Models\Setting::updateOrCreate(['key' => $key], ['value' => $value]);
}
echo "Settings seeded successfully!";
