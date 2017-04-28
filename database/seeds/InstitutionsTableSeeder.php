<?php

use Illuminate\Database\Seeder;

class InstitutionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Only unilorin is available for now, others join in version 1.1
     * @return void
     */
    public function run()
    {
        DB::table('institutions')->insert(array(


             /*array(
                'id' => 1,
                'name' => 'Abdu Gusau Polytechnic',
                ),
            array(
                'id' => 2,
                'name' => 'Abia State Polytechnic',
                ),
            array(
                'id' => 3,
                'name' => 'Abia State University',
                ),
             array(
                'id' => 4,
                'name' => 'Abraham Adesanya Polytechnic',
                ),

             array(
                'id' => 5,
                'name' => 'Abubakar Tafewa Belewa University',
                ),
              array(
                'id' => 6,
                'name' => 'Abubakar Tatari Ali Polytechnic',
                ),
              array(
                'id' => 7,
                'name' => 'Achievers University',
                ),
               array(
                'id' => 8,
                'name' => 'Adamawa State College of Agriculture',
                ),
                array(
                'id' => 9,
                'name' => 'Adamawa State College of Education',
                ),
                array(
                'id' => 10,
                'name' => 'Adamawa State Polytechnic',
                ),
                array(
                'id' => 11,
                'name' => 'Adamawa State University',
                ),
                array(
                'id' => 12,
                'name' => 'Adamu Augie College of Education',
                ),
                
                array(
                'id' => 13,
                'name' => 'Adekunle Ajasin University',
                ),
            array(
                'id' => 14,
                'name' => 'Adeleke University',
                ),
            array(
                'id' => 15,
                'name' => 'Adenirian Ogunsanya College of Education',
                ),
             array(
                'id' => 16,
                'name' => 'Adeyemi College of Education',
                ),

             array(
                'id' => 17,
                'name' => 'Afe Babalola University',
                ),
              array(
                'id' => 18,
                'name' => 'African Thinkers Community of Inquiry',
                ),
              array(
                'id' => 19,
                'name' => 'African University of Science and Technology',
                ),
               array(
                'id' => 20,
                'name' => 'Ahmadu Bello University',
                ),
                array(
                'id' => 21,
                'name' => 'Ajayi Crowther University',
                ),
                array(
                'id' => 22,
                'name' => 'Akanu Ibiam Federal Polytechnic',
                ),
                array(
                'id' => 23,
                'name' => 'Akperan Orshi College of Agriculture',
                ),
                array(
                'id' => 24,
                'name' => 'Akwa Ibom State College of Arts and Science',
                ),
                

                 array(
                'id' => 25,
                'name' => 'Akwa Ibom State College of Education',
                ),
            array(
                'id' => 26,
                'name' => 'Akwa Ibom State Polytechnic',
                ),
            array(
                'id' => 27,
                'name' => 'Akwa Ibom State University',
                ),
             array(
                'id' => 28,
                'name' => 'Al-Hikmah University',
                ),

             array(
                'id' => 29,
                'name' => 'Al-Qalam University',
                ),
              array(
                'id' => 30,
                'name' => 'Allover Central Polytechnic',
                ),
              array(
                'id' => 31,
                'name' => 'Alvan Ikoku College of of Education',
                ),
               array(
                'id' => 32,
                'name' => 'Ambrose Alli University',
                ),
                array(
                'id' => 33,
                'name' => 'American University of Nigeria',
                ),
                array(
                'id' => 34,
                'name' => 'Anambra State College of Agriculture',
                ),
                array(
                'id' => 35,
                'name' => 'Anambra State School of Health Technology',
                ),
                array(
                'id' => 36,
                'name' => 'Anambra State University',
                ),
                
                array(
                'id' => 37,
                'name' => 'Ansar-Ud-Deen College of Education',
                ),
            array(
                'id' => 38,
                'name' => 'Auchi Polytechnic',
                ),
            array(
                'id' => 39,
                'name' => 'Audu Bako School of Agriculture',
                ),
             array(
                'id' => 40,
                'name' => 'Augustine University',
                ),

             array(
                'id' => 41,
                'name' => 'Babcock University',
                ),
              array(
                'id' => 42,
                'name' => 'Bauchi Institute of Arabic and Islamic Studies',
                ),
              array(
                'id' => 43,
                'name' => 'Bauchi State School of Health Technology',
                ),
               array(
                'id' => 44,
                'name' => 'Bauchi State University',
                ),
                array(
                'id' => 45,
                'name' => 'Bayero University',
                ),
                array(
                'id' => 46,
                'name' => 'Baze University',
                ),
                array(
                'id' => 47,
                'name' => 'Bells University of Technology',
                ),

                array(
                'id' => 48,
                'name' => 'Benson Idahosa University',
                ),
                 array(
                'id' => 49,
                'name' => 'Benue State Polytechnic',
                ),
                array(
                'id' => 50,
                'name' => 'Benue State University',
                ),

                  array(
                'id' => 51,
                'name' => 'Bingham University',
                ),
            array(
                'id' => 52,
                'name' => 'Bowen University',
                ),
            array(
                'id' => 53,
                'name' => 'CETEP City University',
                ),
             array(
                'id' => 54,
                'name' => 'Caleb University',
                ),

             array(
                'id' => 55,
                'name' => 'Caritas University',
                ),
              array(
                'id' => 56,
                'name' => 'Christland University',
                ),
              array(
                'id' => 57,
                'name' => 'Christopher University',
                ),
               array(
                'id' => 58,
                'name' => 'City College of Education Mararaba',
                ),
                array(
                'id' => 59,
                'name' => 'College of Administration and Business Studies Konduga',
                ),
                array(
                'id' => 60,
                'name' => 'College of Administration and Business Studies Potiskum',
                ),
                array(
                'id' => 61,
                'name' => 'College of Agriculture (DAC) Kabba',
                ),
                array(
                'id' => 62,
                'name' => 'College of Agriculture Jalingo',
                ),
                
                array(
                'id' => 63,
                'name' => 'College of Agriculture Lafia',
                ),
            array(
                'id' => 64,
                'name' => 'College of Agriculture Zuru',
                ),
            array(
                'id' => 65,
                'name' => 'College of Education Lafiagi',
                ),
             array(
                'id' => 66,
                'name' => 'College of Education Arochukwu',
                ),

             array(
                'id' => 67,
                'name' => 'College of Education Azare',
                ),
              array(
                'id' => 68,
                'name' => 'College of Education Gindiri',
                ),
              array(
                'id' => 69,
                'name' => 'College of Education Ikere-Ekiti',
                ),
               array(
                'id' => 70,
                'name' => 'College of Education Ila-Orangun',
                ),
                array(
                'id' => 71,
                'name' => 'College of Education Jalingo',
                ),
                array(
                'id' => 72,
                'name' => 'College of Education Katsina-Ala',
                ),
                array(
                'id' => 73,
                'name' => 'College of Education Offa',
                ),
                array(
                'id' => 74,
                'name' => 'College of Education Waka BIU',
                ),
            

                 array(
                'id' => 75,
                'name' => 'College of Education Warri',
                ),
            array(
                'id' => 76,
                'name' => 'College of Education, Gashua',
                ),
            array(
                'id' => 77,
                'name' => 'College of Education Ekiadolor-Benin',
                ),
             array(
                'id' => 78,
                'name' => 'Corner Stone College of Education',
                ),

             array(
                'id' => 79,
                'name' => 'Covenant Polytechnic',
                ),
              array(
                'id' => 80,
                'name' => 'Covenant University',
                ),
              array(
                'id' => 81,
                'name' => 'Crawford University',
                ),
               array(
                'id' => 82,
                'name' => 'Crescent University',
                ),
                array(
                'id' => 83,
                'name' => 'Cross River State College of Education',
                ),
                array(
                'id' => 84,
                'name' => 'Cross River State University of Technology',
                ),
                array(
                'id' => 85,
                'name' => 'Crown Polytechnic',
                ),
                array(
                'id' => 86,
                'name' => 'Delar College of Education',
                ),
                
                array(
                'id' => 87,
                'name' => 'Delta State College of Education',
                ),
            array(
                'id' => 88,
                'name' => 'Delta State College of Physical Education',
                ),
            array(
                'id' => 89,
                'name' => 'Delta State Polytechnic Otefe-Ogharra',
                ),
             array(
                'id' => 90,
                'name' => 'Delta State Polytechnic Ozoro',
                ),

             array(
                'id' => 91,
                'name' => 'Delta State Polytechnic Ugwashi-Uku',
                ),
              array(
                'id' => 92,
                'name' => 'Delta State University',
                ),
              array(
                'id' => 93,
                'name' => 'Digital Bridge Institute',
                ),
               array(
                'id' => 94,
                'name' => 'Dorben Polytechnic',
                ),
                array(
                'id' => 95,
                'name' => 'Eastern Palm University',
                ),
                array(
                'id' => 96,
                'name' => 'Ebonyi State College of Education',
                ),
                array(
                'id' => 97,
                'name' => 'Ebonyi State University',
                ),
               
                array(
                'id' => 98,
                'name' => 'Edo State College of Agriculture',
                ),
                 array(
                'id' => 99,
                'name' => 'Edo State College of Agriculture',
                ),
                array(
                'id' => 100,
                'name' => 'Edo State College of Education',
                ),
                
                 array(
                'id' => 101,
                'name' => 'Edo State Institute of Management and Technology',
                ),
            array(
                'id' => 102,
                'name' => 'Edo University',
                ),
            array(
                'id' => 103,
                'name' => 'Edwin Clark University',
                ),
             array(
                'id' => 104,
                'name' => 'Ekiti State University',
                ),

             array(
                'id' => 105,
                'name' => 'Elizade University',
                ),
              array(
                'id' => 106,
                'name' => 'Enugu State College of Education',
                ),
              array(
                'id' => 107,
                'name' => 'Enugu State University of Science and Technology',
                ),
               array(
                'id' => 108,
                'name' => 'Evangel University',
                ),
                array(
                'id' => 109,
                'name' => 'FCT College of Education Zuba',
                ),
                array(
                'id' => 110,
                'name' => 'Federal College of Agriculture Akure',
                ),
                array(
                'id' => 111,
                'name' => 'Federal College of Agriculture Dadinkowa',
                ),
                array(
                'id' => 112,
                'name' => 'Federal College of Agriculture Ibadan',
                ),
                
                array(
                'id' => 113,
                'name' => 'Federal College of Agriculture Ishiagu',
                ),
            array(
                'id' => 114,
                'name' => 'Federal College of Animal Health and Production Technology Ibadan',
                ),
            array(
                'id' => 115,
                'name' => 'Federal College of Animal Health and Production Technology Vom',
                ),
             array(
                'id' => 116,
                'name' => 'Federal College of Chemical and Leather Technology Zaria',
                ),

             array(
                'id' => 117,
                'name' => 'Federal College of Dental Technology Enugu',
                ),
              array(
                'id' => 118,
                'name' => 'Federal College of Education Oyo',
                ),
              array(
                'id' => 119,
                'name' => 'Federal College of Education Potiskum',
                ),
               array(
                'id' => 120,
                'name' => 'Federal College of Education Asaba',
                ),
                array(
                'id' => 121,
                'name' => 'Federal College of Education Akoka',
                ),
                array(
                'id' => 122,
                'name' => 'Federal College of Education Bichi',
                ),
                array(
                'id' => 123,
                'name' => 'Federal College of Education Bissau',
                ),
                array(
                'id' => 124,
                'name' => 'Federal College of Education Gombe',
                ),
               

                 array(
                'id' => 125,
                'name' => 'Federal College of Education Omoku',
                ),
            array(
                'id' => 126,
                'name' => 'Federal College of Education Umunze',
                ),
            array(
                'id' => 127,
                'name' => 'Federal College of Education Eha-Amufu',
                ),
             array(
                'id' => 128,
                'name' => 'Federal College of Education Kano',
                ),

             array(
                'id' => 129,
                'name' => 'Federal College of Education Katsina',
                ),
              array(
                'id' => 130,
                'name' => 'Federal College of Education Kontagora',
                ),
              array(
                'id' => 131,
                'name' => 'Federal College of Education Obudu',
                ),
               array(
                'id' => 132,
                'name' => 'Federal College of Education Okene',
                ),
                array(
                'id' => 133,
                'name' => 'Federal College of Education Osiele',
                ),
                array(
                'id' => 134,
                'name' => 'Federal College of Education Pankshin',
                ),
                array(
                'id' => 135,
                'name' => 'Federal College of Education Yola',
                ),
                array(
                'id' => 136,
                'name' => 'Federal College of Education Zaria',
                ),
                
                array(
                'id' => 137,
                'name' => 'Federal College of Fisheries and Marine Technology',
                ),
            array(
                'id' => 138,
                'name' => 'Federal College of Forestry Ibadan',
                ),
            array(
                'id' => 139,
                'name' => 'Federal College of Forestry Jos',
                ),
             array(
                'id' => 140,
                'name' => 'Federal College of Forestry Mechanisation Afaka',
                ),

             array(
                'id' => 141,
                'name' => 'Federal College of Freshwater Fisheries Technology New Bussa',
                ),
              array(
                'id' => 142,
                'name' => 'Federal College of Land Resources Technology Kuru',
                ),
              array(
                'id' => 143,
                'name' => 'Federal College of Land Resources Technology Owerri',
                ),
               array(
                'id' => 144,
                'name' => 'Federal College of Statistics Enugu',
                ),
                array(
                'id' => 145,
                'name' => 'Federal College of Statistics Ibadan',
                ),
                array(
                'id' => 146,
                'name' => 'Federal College of Statistics Kaduna',
                ),
                array(
                'id' => 147,
                'name' => 'Federal College of Wildlife Management',
                ),

                array(
                'id' => 148,
                'name' => 'Federal Cooperative College Ibadan',
                ),
                 array(
                'id' => 149,
                'name' => 'Federal Cooperative College Kaduna',
                ),
                array(
                'id' => 150,
                'name' => 'Federal Cooperative College Oji River',
                ),

                  array(
                'id' => 151,
                'name' => 'Federal Polytechnic Ado Ekiti',
                ),
            array(
                'id' => 152,
                'name' => 'Federal Polytechnic Bali',
                ),
            array(
                'id' => 153,
                'name' => 'Federal Polytechnic Bauchi',
                ),
             array(
                'id' => 154,
                'name' => 'Federal Polytechnic Bida',
                ),

             array(
                'id' => 155,
                'name' => 'Federal Polytechnic Damaturu',
                ),
              array(
                'id' => 156,
                'name' => 'Federal Polytechnic Ede',
                ),
              array(
                'id' => 157,
                'name' => 'Federal Polytechnic Ekowe',
                ),
               array(
                'id' => 158,
                'name' => 'Federal Polytechnic Idah',
                ),
                array(
                'id' => 159,
                'name' => 'Federal Polytechnic Ilaro',
                ),
                array(
                'id' => 160,
                'name' => 'Federal Polytechnic Kaura Namoda',
                ),
                array(
                'id' => 161,
                'name' => 'Federal Polytechnic Mubi',
                ),
                array(
                'id' => 162,
                'name' => 'Federal Polytechnic Nasarawa',
                ),
                
                array(
                'id' => 163,
                'name' => 'Federal Polytechnic Nekede',
                ),
            array(
                'id' => 164,
                'name' => 'Federal Polytechnic Offa',
                ),
            array(
                'id' => 165,
                'name' => 'Federal Polytechnic Oko',
                ),
             array(
                'id' => 166,
                'name' => 'Federal School of Survey Oyo',
                ),

             array(
                'id' => 167,
                'name' => 'Federal Training Center Calabar',
                ),
              array(
                'id' => 168,
                'name' => 'Federal Training Center Enugu',
                ),
              array(
                'id' => 169,
                'name' => 'Federal Training Center Kaduna',
                ),
               array(
                'id' => 170,
                'name' => 'Federal Training Center Maiduguri',
                ),
                array(
                'id' => 171,
                'name' => 'Federal University Birnin-Kebbi',
                ),
                array(
                'id' => 172,
                'name' => 'Federal University Dutse',
                ),
                array(
                'id' => 173,
                'name' => 'Federal University Dutsin-Ma',
                ),
                array(
                'id' => 174,
                'name' => 'Federal University Gashua',
                ),
               
                 array(
                'id' => 175,
                'name' => 'Federal University Gusau',
                ),
            array(
                'id' => 176,
                'name' => 'Federal University Kashere',
                ),
            array(
                'id' => 177,
                'name' => 'Federal University Lafia',
                ),
             array(
                'id' => 178,
                'name' => 'Federal University Lokoja',
                ),

             array(
                'id' => 179,
                'name' => 'Federal University Ndufu-Alike',
                ),
              array(
                'id' => 180,
                'name' => 'Federal University Otuoke',
                ),
              array(
                'id' => 181,
                'name' => 'Federal University Oye-Ekiti',
                ),
               array(
                'id' => 182,
                'name' => 'Federal University Wukari',
                ),
                array(
                'id' => 183,
                'name' => 'Federal University of Agriculture Abeokuta',
                ),
                array(
                'id' => 184,
                'name' => 'Federal University of Agriculture Makurdi',
                ),
                array(
                'id' => 185,
                'name' => 'Federal University of Petroleum Resources Effurun',
                ),
                array(
                'id' => 186,
                'name' => 'Federal University of Technology Akure',
                ),
                
                array(
                'id' => 187,
                'name' => 'Federal University of Technology Minna',
                ),
            array(
                'id' => 188,
                'name' => 'Federal University of Technology Owerri',
                ),
            array(
                'id' => 189,
                'name' => 'Fidei Polytechnic',
                ),
             array(
                'id' => 190,
                'name' => 'Fountain University',
                ),

             array(
                'id' => 191,
                'name' => 'Godfrey Okoye University',
                ),
              array(
                'id' => 192,
                'name' => 'Gombe State University',
                ),
              array(
                'id' => 193,
                'name' => 'Grace Polytechnic',
                ),
               array(
                'id' => 194,
                'name' => 'Gregory University',
                ),
                array(
                'id' => 195,
                'name' => 'Hallmark University',
                ),
                array(
                'id' => 196,
                'name' => 'Hassan Usman Katsina Polytechnic',
                ),
                array(
                'id' => 197,
                'name' => 'Havard Wilson College of Education',
                ),
               
                array(
                'id' => 198,
                'name' => 'Heritage Polytechnic',
                ),
                 array(
                'id' => 199,
                'name' => 'Hezekiah University',
                ),
                array(
                'id' => 200,
                'name' => 'Hussaini Adamu Federal Polytechnic',
                ),
                
                 array(
                'id' => 201,
                'name' => 'Ibrahim Babangida University',
                ),
            array(
                'id' => 202,
                'name' => 'Igbajo Polytechnic',
                ),
            array(
                'id' => 203,
                'name' => 'Igbinedion University',
                ),
             array(
                'id' => 204,
                'name' => 'Ignatius Ajuru University of Education',
                ),

             array(
                'id' => 205,
                'name' => 'Imo State Polytechnic',
                ),
              array(
                'id' => 206,
                'name' => 'Imo State School of Health Technology',
                ),
              
               array(
                'id' => 208,
                'name' => 'Imo State University',
                ),
                array(
                'id' => 209,
                'name' => 'Institute of Ecumenical Education (Thinkers Corner) Enugu',
                ),
                array(
                'id' => 210,
                'name' => 'Institute of Management and Technology Enugu',
                ),
                array(
                'id' => 211,
                'name' => 'Interlink Polytechnic',
                ),
                array(
                'id' => 212,
                'name' => 'Isa Kaita College of Education Dutsin-Ma',
                ),
                
                array(
                'id' => 213,
                'name' => 'Isaac Jasper Boro College of Education',
                ),
            array(
                'id' => 214,
                'name' => 'JamaAtu College of Education (JACE) Kaduna',
                ),
            array(
                'id' => 215,
                'name' => 'Jigawa State College of Education',
                ),
             array(
                'id' => 216,
                'name' => 'Jigawa State Collge of Agriculture',
                ),

             array(
                'id' => 217,
                'name' => 'Jigawa State Polytechnic',
                ),
              array(
                'id' => 218,
                'name' => 'Joseph Ayo Babalola University',
                ),
              array(
                'id' => 219,
                'name' => 'Kaduna Polytechnic Kaduna',
                ),
               array(
                'id' => 220,
                'name' => 'Kaduna State College of Education Gidan-Waya',
                ),
                array(
                'id' => 221,
                'name' => 'Kaduna State University',
                ),
                array(
                'id' => 222,
                'name' => 'Kano State Polytechnic',
                ),
                array(
                'id' => 223,
                'name' => 'Kano University of Science and Technology',
                ),
                array(
                'id' => 224,
                'name' => 'Kashim Ibrahim College of Education',
                ),
                

                 array(
                'id' => 225,
                'name' => 'Kebbi State University of Science and Technology',
                ),
            array(
                'id' => 226,
                'name' => 'Kings Polytechnic',
                ),
            array(
                'id' => 227,
                'name' => 'Kings University',
                ),
             array(
                'id' => 228,
                'name' => 'Kogi State College of Education',
                ),

             array(
                'id' => 229,
                'name' => 'Kogi State College of Education (Technical)',
                ),
              array(
                'id' => 230,
                'name' => 'Kogi State Polytechnic',
                ),
              array(
                'id' => 231,
                'name' => 'Kogi State University',
                ),
               array(
                'id' => 232,
                'name' => 'Kwara State College of Education',
                ),
                array(
                'id' => 233,
                'name' => 'Kwara State College of Education Oro',
                ),
                array(
                'id' => 234,
                'name' => 'Kwara State Polytechnic',
                ),
                array(
                'id' => 235,
                'name' => 'Kwara State University',
                ),
                array(
                'id' => 236,
                'name' => 'Kwararafa University',
                ),
                
                array(
                'id' => 237,
                'name' => 'Ladoke Akintola University of Technology',
                ),
            array(
                'id' => 238,
                'name' => 'Lagos City Polytechnic',
                ),
            array(
                'id' => 239,
                'name' => 'Lagos State Polytechnic',
                ),
             array(
                'id' => 240,
                'name' => 'Lagos State University',
                ),

             array(
                'id' => 241,
                'name' => 'Landmark university',
                ),
              array(
                'id' => 242,
                'name' => 'Lead City University',
                ),
              array(
                'id' => 243,
                'name' => 'Lighthouse Polytechnic',
                ),
               array(
                'id' => 244,
                'name' => 'Madonna University',
                ),
                array(
                'id' => 245,
                'name' => 'Maftau Olanihun College of Education',
                ),
                array(
                'id' => 246,
                'name' => 'Maritime Academy of Nigeria',
                ),
                array(
                'id' => 247,
                'name' => 'McPherson University',
                ),

                array(
                'id' => 248,
                'name' => 'Michael Opara University of Agriculture',
                ),
                 array(
                'id' => 249,
                'name' => 'Michael Otedola College of Primary Education',
                ),
                array(
                'id' => 250,
                'name' => 'Michael and Cecilia Ibru University',
                ),

                  array(
                'id' => 251,
                'name' => 'Modibbo Adama University of Technology',
                ),
            array(
                'id' => 252,
                'name' => 'Mohamet Lawan College of Agriculture',
                ),
            array(
                'id' => 253,
                'name' => 'Moshood Abiola Polytechnic',
                ),
             array(
                'id' => 254,
                'name' => 'Mountain Top University',
                ),

             array(
                'id' => 255,
                'name' => 'Muhyideen College of Education',
                ),
              array(
                'id' => 256,
                'name' => 'NKST College of Health Technology Mkar',
                ),
              array(
                'id' => 257,
                'name' => 'Nacabs Polytechnic',
                ),
               array(
                'id' => 258,
                'name' => 'Nasarawa State College of Education',
                ),
                array(
                'id' => 259,
                'name' => 'Nasarawa State Polytechnic',
                ),
                array(
                'id' => 260,
                'name' => 'Nasarawa State University',
                ),
                array(
                'id' => 261,
                'name' => 'National Metallurgical Training Institute',
                ),
                array(
                'id' => 262,
                'name' => 'National Open University of Nigeria',
                ),
                
                array(
                'id' => 263,
                'name' => 'Niger Delta University',
                ),
            array(
                'id' => 264,
                'name' => 'Niger State College of Agriculture',
                ),
            array(
                'id' => 265,
                'name' => 'Niger State College of Education',
                ),
             array(
                'id' => 266,
                'name' => 'Niger State Polytechnic',
                ),

             array(
                'id' => 267,
                'name' => 'Nigerian Turkish Nile University',
                ),
              array(
                'id' => 268,
                'name' => 'Nnamdi Azikiwe University',
                ),
              array(
                'id' => 269,
                'name' => 'Nogak Polytechnic',
                ),
               array(
                'id' => 270,
                'name' => 'Northwest University',
                ),
                array(
                'id' => 271,
                'name' => 'Novena University',
                ),
                array(
                'id' => 272,
                'name' => 'Nuhu Bamalli Polytechnic',
                ),
                array(
                'id' => 273,
                'name' => 'Nwafor Orizu College of Education',
                ),
                array(
                'id' => 274,
                'name' => 'OSISA Tech College of Education Enugu',
                ),
                

                 array(
                'id' => 275,
                'name' => 'Obafemi Awolowo University',
                ),
            array(
                'id' => 276,
                'name' => 'Obong University',
                ),
            array(
                'id' => 277,
                'name' => 'Oduduwa University',
                ),
             array(
                'id' => 278,
                'name' => 'Ogun State Institute of Technology',
                ),

             array(
                'id' => 279,
                'name' => 'Ogun State Institute of Technology Igbesa',
                ),
              array(
                'id' => 280,
                'name' => 'Olabisi Onabanjo University',
                ),
              array(
                'id' => 281,
                'name' => 'Ondo State University of Technology',
                ),
               array(
                'id' => 282,
                'name' => 'Osun State College of Education Illesa',
                ),
                array(
                'id' => 283,
                'name' => 'Osun State College of Technology',
                ),
                array(
                'id' => 284,
                'name' => 'Osun State Polytechnic',
                ),
                array(
                'id' => 285,
                'name' => 'Osun State University',
                ),
                array(
                'id' => 286,
                'name' => 'Othman Dan-Fodio University',
                ),
                
                array(
                'id' => 287,
                'name' => 'Our Saviour institute of Science Agriculture and Technology ',
                ),
            array(
                'id' => 288,
                'name' => 'Oyo State College of Agriculture',
                ),
            array(
                'id' => 289,
                'name' => 'Emmanuel Alayande College of Education',
                ),
             array(
                'id' => 290,
                'name' => 'Pan-Atlantic University',
                ),

             array(
                'id' => 291,
                'name' => 'Paul University',
                ),
              array(
                'id' => 292,
                'name' => 'Petroleum Training Institute',
                ),
              array(
                'id' => 293,
                'name' => 'Plateau State College of Agriculture',
                ),
               array(
                'id' => 294,
                'name' => 'Plateau State Polytechnic',
                ),
                array(
                'id' => 295,
                'name' => 'Plateau State University',
                ),
                array(
                'id' => 296,
                'name' => 'Ramat Polytechnic',
                ),
                array(
                'id' => 297,
                'name' => 'Redeemers University',
                ),
               
                array(
                'id' => 298,
                'name' => 'Regional Agricultural Training School',
                ),
                 array(
                'id' => 299,
                'name' => 'Renaissance University',
                ),
                array(
                'id' => 300,
                'name' => 'Rhema University',
                ),
                
                 array(
                'id' => 301,
                'name' => 'Ritman University',
                ),
            array(
                'id' => 302,
                'name' => 'Rivers State College of Arts and Science',
                ),
            array(
                'id' => 303,
                'name' => 'Ignatius Ajuru University of Education',
                ),
             array(
                'id' => 304,
                'name' => 'Rivers State College of Health Sciences and Technology',
                ),

             array(
                'id' => 305,
                'name' => 'Rivers State Polytechnic',
                ),
              array(
                'id' => 306,
                'name' => 'Rivers State University of Science and Technology',
                ),
              array(
                'id' => 307,
                'name' => 'Ronik Polytechnic',
                ),
               array(
                'id' => 308,
                'name' => 'Rufus Giwa Polytechnic',
                ),
                array(
                'id' => 309,
                'name' => 'Saadatu Rimi College of Education Kumbotso  ',
                ),
                array(
                'id' => 310,
                'name' => 'Salem University',
                ),
                array(
                'id' => 311,
                'name' => 'Samaru College of Agriculture (DAC) Zaria',
                ),
                array(
                'id' => 312,
                'name' => 'Samuel Adegboyega University',
                ),
                
                array(
                'id' => 313,
                'name' => 'School of Health Takum',
                ),
            array(
                'id' => 314,
                'name' => 'School of Health Technology Aba',
                ),
            array(
                'id' => 315,
                'name' => 'School of Health Technology Akure',
                ),
             array(
                'id' => 316,
                'name' => 'School of Health Technology Alushi Via',
                ),

             array(
                'id' => 317,
                'name' => 'School of Health Technology Benin City',
                ),
              array(
                'id' => 318,
                'name' => 'School of Health Technology Calabar',
                ),
              array(
                'id' => 319,
                'name' => 'School of Health Technology Daura',
                ),
               array(
                'id' => 320,
                'name' => 'School of Health Technology Elesa',
                ),
                array(
                'id' => 321,
                'name' => 'School of Health Technology Etinan',
                ),
                array(
                'id' => 322,
                'name' => 'School of Health Technology Idah',
                ),
                array(
                'id' => 323,
                'name' => 'School of Health Technology Ijero-Elati',
                ),
                array(
                'id' => 324,
                'name' => 'School of Health Technology Illesa',
                ),
               
                 array(
                'id' => 325,
                'name' => 'School of Health Technology Inyi',
                ),
            array(
                'id' => 326,
                'name' => 'School of Health Technology Jahun',
                ),
            array(
                'id' => 327,
                'name' => 'School of Health Technology Jega',
                ),
             array(
                'id' => 328,
                'name' => 'School of Health Technology Kaltungo',
                ),

             array(
                'id' => 329,
                'name' => 'School of Health Technology Kankia',
                ),
              array(
                'id' => 330,
                'name' => 'School of Health Technology Kano',
                ),
              array(
                'id' => 331,
                'name' => 'School of Health Technology Maiduguri',
                ),
               array(
                'id' => 332,
                'name' => 'School of Health Technology Makurdi',
                ),
                array(
                'id' => 333,
                'name' => 'School of Health Technology Minna',
                ),
                array(
                'id' => 334,
                'name' => 'School of Health Technology Mubi',
                ),
                array(
                'id' => 335,
                'name' => 'School of Health Technology Offa',
                ),
                array(
                'id' => 336,
                'name' => 'School of Health Technology Ofuoma',
                ),
                
                array(
                'id' => 337,
                'name' => 'School of Health Technology Oji River',
                ),
            array(
                'id' => 338,
                'name' => 'School of Health Technology Pankshin',
                ),
            array(
                'id' => 339,
                'name' => 'School of Health Technology Tungar Magajiya',
                ),
             array(
                'id' => 340,
                'name' => 'School of Health Technology Yaba',
                ),

             array(
                'id' => 341,
                'name' => 'School of Health Technology Zawan-Jos',
                ),
              array(
                'id' => 342,
                'name' => 'School of Hygiene Eleyele',
                ),
              array(
                'id' => 343,
                'name' => 'School of Hygiene Kano',
                ),
               array(
                'id' => 344,
                'name' => 'School of Public Health Nursing Nsukka',
                ),
                array(
                'id' => 345,
                'name' => 'Shaka Polytechnic',
                ),
                array(
                'id' => 346,
                'name' => 'Shehu Idris College of Health Sciences and Technogy Makarfi',
                ),
                array(
                'id' => 347,
                'name' => 'Shehu Shagari College of Education',
                ),

                array(
                'id' => 348,
                'name' => 'Sokoto State Polytechnic',
                ),
                 array(
                'id' => 349,
                'name' => 'Sokoto State University',
                ),
                array(
                'id' => 350,
                'name' => 'Southwestern University',
                ),

                  array(
                'id' => 351,
                'name' => 'St. Augustine College of Education',
                ),
            array(
                'id' => 352,
                'name' => 'Sule Lamido University',
                ),
            array(
                'id' => 353,
                'name' => 'Sultan Abdur-Rahman School of Health Technology Gwadabawa',
                ),
             array(
                'id' => 354,
                'name' => 'Summit University',
                ),

             array(
                'id' => 355,
                'name' => 'Tai Solarin College of Education',
                ),
              array(
                'id' => 356,
                'name' => 'Tansian University',
                ),
              array(
                'id' => 357,
                'name' => 'Taraba State Polytechnic',
                ),
               array(
                'id' => 358,
                'name' => 'Taraba State University',
                ),
                array(
                'id' => 359,
                'name' => 'Temple Gate Polytechnic',
                ),
                array(
                'id' => 360,
                'name' => 'The Gateway ICT Polytechnic Saapade',
                ),
                array(
                'id' => 361,
                'name' => 'The Polytechnic Ibadan',
                ),
                array(
                'id' => 362,
                'name' => 'The Polytechnic Ile-Ife',
                ),
                
                array(
                'id' => 363,
                'name' => 'The Polytechnic Imesi-Ife',
                ),
            array(
                'id' => 364,
                'name' => 'The Technical University',
                ),
            array(
                'id' => 365,
                'name' => 'Tower Polytechnic',
                ),
             array(
                'id' => 366,
                'name' => 'Umar Ibn Ibrahim El-Kanemi College of Education Science and Technology',
                ),

             array(
                'id' => 367,
                'name' => 'Umaru Musa Yaradua University',
                ),
              array(
                'id' => 368,
                'name' => 'University of Abuja',
                ),
              array(
                'id' => 369,
                'name' => 'University of Benin',
                ),
               array(
                'id' => 370,
                'name' => 'University of Calabar',
                ),
                array(
                'id' => 371,
                'name' => 'University of Ibadan',
                ),*/
                array(
                'id' => 372,
                'name' => 'University of Ilorin',
                ),
                /*array(
                'id' => 373,
                'name' => 'University of Jos',
                ),
                array(
                'id' => 374,
                'name' => 'University of Lagos',
                ),
                
                 array(
                'id' => 375,
                'name' => 'University of Maiduguri',
                ),
            array(
                'id' => 376,
                'name' => 'University of Mkar',
                ),
            array(
                'id' => 377,
                'name' => 'University of Nigeria Nsukka',
                ),
             array(
                'id' => 378,
                'name' => 'University of Port-Harcourt',
                ),

             array(
                'id' => 379,
                'name' => 'University of Uyo',
                ),
              array(
                'id' => 380,
                'name' => 'Usman Danfodio University',
                ),
              array(
                'id' => 381,
                'name' => 'Veritas University',
                ),
               array(
                'id' => 382,
                'name' => 'Waziri Umaru Federal Polytechnic',
                ),
                array(
                'id' => 383,
                'name' => 'Wellspring University',
                ),
                array(
                'id' => 384,
                'name' => 'Wesley University of Science and Technology',
                ),
                array(
                'id' => 385,
                'name' => 'Western Delta University',
                ),
                array(
                'id' => 386,
                'name' => 'Wolex Polytechnic',
                ),
                
                array(
                'id' => 387,
                'name' => 'Yaba College of Technology',
                ),
            array(
                'id' => 388,
                'name' => 'Yewa Central College of Education',
                ),
            array(
                'id' => 389,
                'name' => 'Yobe State College of Agriculture',
                ),
             array(
                'id' => 390,
                'name' => 'Yobe State Polytechnic',
                ),

             array(
                'id' => 391,
                'name' => 'Yobe State University',
                ),
              array(
                'id' => 392,
                'name' => 'Zamfara State College of Agriculture and Animal Science',
                ),
              array(
                'id' => 393,
                'name' => 'Zamfara State College of Education',
                ),
               
           
           */
           

        ));
    }

}