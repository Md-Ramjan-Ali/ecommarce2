<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\District;

class DistrictSeeder extends Seeder
{
    public function run()
    {
        $districtsData = [
            'Dhaka' => ['Dhaka Sadar', 'Mirpur', 'Uttara', 'Dhanmondi', 'Gulshan', 'Banani', 'Mohammadpur', 'Savara', 'Dhamrai', 'Keraniganj'],
            'Gazipur' => ['Gazipur Sadar', 'Tongi', 'Kaliakair', 'Kapasia', 'Sreepur'],
            'Narayanganj' => ['Narayanganj Sadar', 'Siddhirganj', 'Fatullah', 'Rupganj', 'Araihazar', 'Sonargaon'],
            'Narsingdi' => ['Narsingdi Sadar', 'Madhabdi', 'Palash', 'Raipura', 'Shibpur', 'Belabo'],
            'Chattogram' => ['Chattogram Sadar', 'Agrabad', 'Pahartali', 'Halishahar', 'Patiya', 'Hathazari', 'Sitakunda', 'Raozan', 'Anwara'],
            'Satkhira' => ['Satkhira Sadar', 'Kalaroa', 'Tala', 'Shyamnagar', 'Assasuni', 'Debhata', 'Kaliganj'],
            'Khulna' => ['Khulna Sadar', 'Daulatpur', 'Khalishpur', 'Sonadanga', 'Rupsha', 'Phultala', 'Batiaghata', 'Dacope', 'Paikgachha', 'Koyra'],
            'Rajshahi' => ['Rajshahi Sadar', 'Boalia', 'Rajpara', 'Motihar', 'Shah Mokdum', 'Paba', 'Godagari', 'Tanore', 'Bagha', 'Charghat'],
            'Sylhet' => ['Sylhet Sadar', 'Zindabazar', 'Amberkhana', 'Kotwali', 'South Surma', 'Beanibazar', 'Golapganj'],
            'Barishal' => ['Barishal Sadar', 'Kotwali', 'Babuganj', 'Bakerganj', 'Banaripara', 'Gournadi', 'Mehendiganj', 'Muladi'],
            'Rangpur' => ['Rangpur Sadar', 'Kotwali', 'Badarganj', 'Gangachara', 'Kaunia', 'Mithapukur', 'Pirgachha', 'Pirganj'],
            'Mymensingh' => ['Mymensingh Sadar', 'Kotwali', 'Bhaluka', 'Trishal', 'Gafargaon', 'Muktagachha', 'Phulpur'],
            'Cumilla' => ['Cumilla Sadar', 'Kandirpar', 'Choddagram', 'Daudkandi', 'Debidwar', 'Homna', 'Laksam', 'Muradnagar'],
            'Bogura' => ['Bogura Sadar', 'Satmatha', 'Adamdighi', 'Dhunat', 'Gabtali', 'Kahaloo', 'Nandigram', 'Sariakandi', 'Sherpur', 'Shibganj'],
            'Jessore' => ['Jessore Sadar', 'Abhaynagar', 'Bagherpara', 'Chaugachha', 'Jhikargachha', 'Keshabpur', 'Manirampur', 'Sharsha'],
            'Cox\'s Bazar' => ['Cox\'s Bazar Sadar', 'Chakaria', 'Kutubdia', 'Maheshkhali', 'Ramu', 'Teknaf', 'Ukhia'],
            'Faridpur' => ['Faridpur Sadar', 'Alfadanga', 'Bhanga', 'Boalmari', 'Charbhadrasan', 'Nagarkanda', 'Sadarpur'],
            'Gopalganj' => ['Gopalganj Sadar', 'Kashiani', 'Kotalipara', 'Muksudpur', 'Tungipara'],
            'Madaripur' => ['Madaripur Sadar', 'Kalkini', 'Rajoir', 'Shibchar'],
            'Rajbari' => ['Rajbari Sadar', 'Baliakandi', 'Goalandaghat', 'Pangsha'],
            'Shariatpur' => ['Shariatpur Sadar', 'Bhedarganj', 'Damudya', 'Gosairhat', 'Naria', 'Zajira'],
            'Kishorganj' => ['Kishorganj Sadar', 'Baitul Aman', 'Bhajon', 'Itna', 'Karimganj', 'Katiadi', 'Kuliarchar', 'Nikli', 'Pakundia', 'Tarail'],
            'Manikganj' => ['Manikganj Sadar', 'Daulatpur', 'Gheor', 'Lechhraganj', 'Saturia', 'Shivalaya', 'Singair'],
            'Munshiganj' => ['Munshiganj Sadar', 'Gazaria', 'Lohajang', 'Sirajdikhan', 'Sreenagar', 'Tongibari'],
            'Brahmanbaria' => ['Brahmanbaria Sadar', 'Akhaura', 'Ashuganj', 'Bancharampur', 'Kasba', 'Nabinagar', 'Nasirnagar', 'Sarail'],
            'Chandpur' => ['Chandpur Sadar', 'Faridganj', 'Haimchar', 'Hajiganj', 'Kachua', 'Matlab North', 'Matlab South', 'Shahrasti'],
            'Feni' => ['Feni Sadar', 'Chhagalnaiya', 'Daganbhuiyan', 'Fulgazi', 'Parshuram', 'Sonagazi'],
            'Lakshmipur' => ['Lakshmipur Sadar', 'Kamalnagar', 'Raipur', 'Ramganj', 'Ramgati'],
            'Noakhali' => ['Noakhali Sadar', 'Begumganj', 'Chatkhil', 'Companiganj', 'Hatiya', 'Senbagh', 'Subarnachar'],
            'Bandarban' => ['Bandarban Sadar', 'Ali Kadam', 'Lama', 'Naikhongchhari', 'Ruma', 'Thanchi'],
            'Khagrachhari' => ['Khagrachhari Sadar', 'Dighinala', 'Lakshmichhari', 'Mahalchhari', 'Manikchhari', 'Matiranga', 'Panchhari', 'Ramgarh'],
            'Rangamati' => ['Rangamati Sadar', 'Bagaichhari', 'Barkal', 'Kawkhali', 'Langadu', 'Naniarchar', 'Rajasthali'],
            'Jaipurhat' => ['Jaipurhat Sadar', 'Akkelpur', 'Kalai', 'Khetlal', 'Panchbibi'],
            'Naogaon' => ['Naogaon Sadar', 'Atrai', 'Badalgachhi', 'Dhamoirhat', 'Manda', 'Niamatpur', 'Patnitala', 'Raninagar', 'Sapahar'],
            'Natore' => ['Natore Sadar', 'Baraigram', 'Gurudaspur', 'Lalpur', 'Naldanga', 'Singra'],
            'Nawabganj' => ['Nawabganj Sadar', 'Bholahat', 'Gomastapur', 'Nachole', 'Shibganj'],
            'Pabna' => ['Pabna Sadar', 'Atgharia', 'Bera', 'Bhangura', 'Chatmohar', 'Faridpur', 'Ishwardi', 'Santhia', 'Sujanagar'],
            'Sirajganj' => ['Sirajganj Sadar', 'Belkuchi', 'Chauhali', 'Kamarkhanda', 'Kazipur', 'Rayganj', 'Shahjadpur', 'Tarash', 'Ullahpara'],
            'Dinajpur' => ['Dinajpur Sadar', 'Birampur', 'Birganj', 'Biral', 'Bochaganj', 'Chirirbandar', 'Phulbari', 'Ghoraghat', 'Hakimpur', 'Kaharole', 'Khansama', 'Nawabganj', 'Parbatipur'],
            'Gaibandha' => ['Gaibandha Sadar', 'Phulchhari', 'Gobindaganj', 'Palashbari', 'Sadullapur', 'Saghata', 'Sundarganj'],
            'Kurigram' => ['Kurigram Sadar', 'Bhurungamari', 'Char Rajibpur', 'Chilmari', 'Phulbari', 'Nageshwari', 'Rajarhat', 'Raomari', 'Ulipur'],
            'Lalmonirhat' => ['Lalmonirhat Sadar', 'Aditmari', 'Hatibandha', 'Kaliganj', 'Patgram'],
            'Nilphamari' => ['Nilphamari Sadar', 'Dimla', 'Domar', 'Jaldhaka', 'Kishoreganj', 'Saidpur'],
            'Panchagarh' => ['Panchagarh Sadar', 'Atwari', 'Boda', 'Debiganj', 'Tetulia'],
            'Thakurgaon' => ['Thakurgaon Sadar', 'Baliadangi', 'Haripur', 'Pirganj', 'Ranisankail'],
            'Barguna' => ['Barguna Sadar', 'Amatali', 'Bamna', 'Betagi', 'Patharghata', 'Taltali'],
            'Bhola' => ['Bhola Sadar', 'Burhanuddin', 'Char Fasson', 'Daulatkhan', 'Lalmohan', 'Manpura', 'Tazumuddin'],
            'Jhalokati' => ['Jhalokati Sadar', 'Kathalia', 'Nalchity', 'Rajapur'],
            'Patuakhali' => ['Patuakhali Sadar', 'Bauphal', 'Dashmina', 'Galachipa', 'Kalapara', 'Mirzaganj', 'Rangabali'],
            'Pirojpur' => ['Pirojpur Sadar', 'Bhandaria', 'Kawkhali', 'Mathbaria', 'Nazirpur', 'Nesarabad', 'Zianagar'],
            'Bagerhat' => ['Bagerhat Sadar', 'Chitalmari', 'Fakirhat', 'Kachua', 'Mollahat', 'Mongla', 'Morrelganj', 'Rampal', 'Sarankhola'],
            'Chuadanga' => ['Chuadanga Sadar', 'Alamdanga', 'Damurhuda', 'Jibannagar'],
            'Jhenaidah' => ['Jhenaidah Sadar', 'Harakunda', 'Kaliganj', 'Kotchandpur', 'Maheshpur', 'Shailkupa'],
            'Kushtia' => ['Kushtia Sadar', 'Bheramara', 'Daulatpur', 'Khoksa', 'Kumarkhali', 'Mirpur'],
            'Magura' => ['Magura Sadar', 'Arpara', 'Mohammadpur', 'Shalikha', 'Sreepur'],
            'Meherpur' => ['Meherpur Sadar', 'Gangni', 'Mujibnagar'],
            'Narail' => ['Narail Sadar', 'Kalia', 'Lohagara'],
            'Habiganj' => ['Habiganj Sadar', 'Ajmiriganj', 'Bahubal', 'Baniyachong', 'Chunarughat', 'Nabiganj', 'Madhabpur'],
            'Moulvibazar' => ['Moulvibazar Sadar', 'Barlekha', 'Kamalganj', 'Kulaura', 'Rajnagar', 'Sreemangal'],
            'Sunamganj' => ['Sunamganj Sadar', 'Bishwamambharpur', 'Chhatak', 'Derai', 'Dharamapasha', 'Dowarabazar', 'Jagannathpur', 'Jamalganj', 'Sullah', 'Tahirpur'],
            'Jamalpur' => ['Jamalpur Sadar', 'Baksiganj', 'Dewanganj', 'Isampur', 'Madarganj', 'Melandaha', 'Sarishabari'],
            'Netrokona' => ['Netrokona Sadar', 'Atpara', 'Barhatta', 'Durgapur', 'Kalmakanda', 'Kendra', 'Khaliajuri', 'Madan', 'Mohanganj', 'Purbadhala'],
            'Sherpur' => ['Sherpur Sadar', 'Jhenalgati', 'Nakla', 'Nalitabari', 'Sreebardi']
        ];

        $areaId = 1;
        foreach ($districtsData as $districtName => $areas) {
            foreach ($areas as $areaName) {
                District::create([
                    'area_id' => $areaId,
                    'area_name' => $areaName,
                    'district' => $districtName,
                    'shippingfee' => '60',
                    'partialpayment' => '0',
                ]);
                $areaId++;
            }
        }
    }
}
