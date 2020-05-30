-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2020 at 05:53 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi_lb1`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_penyakit`
--

CREATE TABLE `data_penyakit` (
  `kode_icdx` varchar(50) NOT NULL,
  `nama_penyakit` varchar(200) NOT NULL,
  `kode_dx` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_penyakit`
--

INSERT INTO `data_penyakit` (`kode_icdx`, `nama_penyakit`, `kode_dx`) VALUES
('A00', 'Cholera', 1),
('A01.0', 'Typhoid Fever', 1),
('A03', 'Syghelosis', 1),
('A06', 'Amoebiasis', 1),
('A09', 'Diare', 1),
('A14', 'TB Relaps / Kategori II', 2),
('A15', 'TB Paru BTA (+)', 2),
('A16', 'TB Klinis  Termasuk Rongent (+) BTA (-)  ', 2),
('A18', 'TB Organ Lain', 2),
('A30', 'Lepra', 3),
('A31', 'Kusta PB', 3),
('A32', 'Kusta MB', 3),
('A33', 'Tetanus Neonatorum', 20),
('A35', 'Tetanus Lainnya', 3),
('A36', 'Diphtheria', 3),
('A37', 'Batuk Rejan', 3),
('A51', 'Early syphilis', 6),
('A52', 'Late syphilis', 6),
('A53', 'Sipilis', 6),
('A54', 'Infeksi Gonokok', 6),
('A55', 'Chlamydial Lymphogranuloma venerum', 6),
('A56', 'Non Gonokok', 6),
('A59', 'TRICHOMONAS', 6),
('A59.0', 'Urogenital trichomoniasis', 6),
('A63.0', 'Condyloma accuminatum', 29),
('A80', 'Acute Poliomyelitis', 4),
('A90', 'Dengue  Fever', 4),
('A91', 'Dengue Haemorrhagic fever', 4),
('A92.0', 'Chikungunya virus diseasa', 4),
('B00', 'Herpes simplex', 4),
('B01', 'Varicella ', 4),
('B02', 'Herpes Zoster', 4),
('B05', 'Morbili.', 4),
('B07', 'Verruca vulgaris', 4),
('B15', 'Acute Hepatitis A ', 4),
('B16', 'Acute hepatitis B ', 4),
('B17', 'Other Acute hepatitis', 4),
('B18', 'Chronic viral hepatitis', 4),
('B24', 'Unspecific HIV', 4),
('B25', 'Cytomegaloviral pneumonitis', 29),
('B26', 'Mumps', 4),
('B35', 'Penyakit kulit karena jamur', 7),
('B36.0', 'Pityriasis versicolour', 7),
('B37.0', 'Candidal stomatitis', 7),
('B40.0', 'Acute pulmonary blastomycosis', 29),
('B50', 'Malaria Tropika (P Falciparum)', 5),
('B51', 'Malaria Tertiana (P Vivax)', 5),
('B54', 'Unspecified malaria. Clinically diagnosed malaria without', 5),
('B55', 'parasitological confirmation.', 5),
('B58', 'Toxoplasmosis', 5),
('B74', 'Filariasis', 7),
('B82.0', 'Intestinal helminthiasis', 7),
('B86', 'Scabies.', 7),
('B90', 'Gejala sisa dari TBC', 7),
('B91', 'Gejala sisa dari poliomyelitis.', 7),
('B92', 'Gejala sisa dari Kusta / Lepra', 7),
('C11', 'Tumor ganas : Nasopharynx', 21),
('C18', 'Tumor Ganas : Usus Besar', 21),
('C22', 'Ca Hepar', 21),
('C34', 'Ca Paru-2', 21),
('C50', 'Tumor ganas : Payudara', 21),
('C53', 'Tumor ganas : Cervix', 21),
('C61', 'Tumor ganas : Prostate', 21),
('C76', 'Tumor ganas lain2', 21),
('C95', 'Tumor ganas darah: Leukemia, Thalasemia', 21),
('D17', 'Tumor jinak : Lipoma', 21),
('D18', 'Tumor jinak : Hemangioma, Lymphangioma', 21),
('D22', 'Tumor jinak : Melanocyclic Naevy', 21),
('D24', 'Tumor jinak : Payudara', 21),
('D25', 'Tumor jinak : Myoma', 21),
('D27', 'Tumor jinak : Ovarium', 21),
('D36', 'Tumor jinak : lain-2', 21),
('D50', 'Anemia: Deff Fe', 9),
('D51', 'Anemia :Deff B12', 9),
('D52', 'Anemia: Asam Folat', 9),
('D53', 'Anemia lain', 9),
('E01', 'GAKI: Gondok Endemik: STRUMA', 8),
('E05', 'Hipertiroidisme', 8),
('E10', 'Type 1: Insulin dependen DM', 8),
('E11', 'Type 2: Non insulin dependen DM', 8),
('E16.2', 'Hypoglycaemia', 9),
('E40', 'Kwashiorkor', 9),
('E41', 'Nutritional marasmus', 9),
('E42', 'Marasmic kwashiorkor', 9),
('E50.7', 'Xerophtalmia', 12),
('E66', 'Obesity', 9),
('E78.0', 'Pure hypercholesterolaemia', 9),
('E78.5', 'Hyperlipidaemia', 9),
('E79', 'Gangguan Metabolisme purin pyrimidin', 9),
('F03', 'Dimensia unspecified', 10),
('F05', 'Delirium', 10),
('F10', 'Penyalahgunaan Alkohol', 10),
('F17', 'Penyalahgunaan tembakau', 10),
('F19', 'Penyalahgunaan Narkoba', 10),
('F20', 'Schizophrenia', 10),
('F29', 'Gangguan psikotik', 10),
('F31', 'Gangguan Bipolar', 10),
('F32', 'Gangguan Depresif', 10),
('F40', 'Gangguan Fobik', 10),
('F41', 'Gangguan Panik', 10),
('F41.1', 'Gangguan Anxietas', 10),
('F41.2', 'Gangguan Campuran Anxietas & Depresif ', 10),
('F42', 'Gangguan Obsesif Kompulsif', 10),
('F43.2', 'Gangguan Penyesuaian', 10),
('F45', 'Gangguan Somatoform', 10),
('F48', 'Gangguan Neurotik', 10),
('F50.0', 'Anoreksia nervosa', 10),
('F51.0', 'INSOMNIA Non Organik', 29),
('F52', 'Gangguan Seksual pada Pria dan Wanita', 10),
('F53', 'Ganguan Jiwa & Perilaku yang berhubungan dengan Masa Nifas', 10),
('F69', 'Gangguan kepribadian', 10),
('F79', 'Retardasi Mental', 10),
('F84', 'Gangguan Perkembangan Pervasif', 10),
('F90', 'Gangguan Hiperkinetik', 10),
('F91', 'Gangguan Tingkah Laku', 10),
('F98', 'Gangguan jiwa bermula pada bayi, anak/remaja', 10),
('G03.9', 'Meningitis,  ', 11),
('G04.9', 'Encephalitis, ', 11),
('G20', 'Parkinson\'s', 11),
('G30', 'Alzheimer', 11),
('G35', 'Multiple sklerosis', 11),
('G40', 'Epilepsi', 11),
('G41', 'Status epilepticus', 11),
('G43', 'Migraina', 11),
('G44.2', 'Tension Headache', 11),
('G47', 'Gangguan tidur', 11),
('G51.0', 'Bell\'s Palsy', 11),
('G54.2', 'CRS', 29),
('G62', 'Polineuropathy', 11),
('G80', 'Cerebral Palsy', 11),
('G81', 'Hemiplegia', 11),
('G82', 'Paraplegia dan Tetraplegia', 11),
('G89', 'Acute Flaccid Paralysis (LUMPUH LAYU AKUTA)', 11),
('G91', 'Hydrocephalus', 11),
('H00', 'Hordeolum (Bintilan)', 12),
('H01', 'Peradangan Kelopak mata', 12),
('H02', 'Other disorders of eyelid', 29),
('H04', 'Kelainan pada sistem kelenjar air mata', 12),
('H10', 'Conjunctivitis', 12),
('H11', 'Pterigium', 12),
('H16', 'Kerattitis', 12),
('H18', 'Kekeruhan Kornea', 12),
('H20', 'Iridociclitis/ Uveitis', 12),
('H26', 'Katarak', 12),
('H40', 'Glaukoma', 12),
('H50.2', 'HIPERROPIA', 29),
('H52', 'Disorders of refraction and accommodation', 29),
('H52.1', 'MIOPIA', 29),
('H52.2', 'ASTIGMASMUS', 29),
('H52.4', 'PRESBIOPIA', 29),
('H53.5', 'Buta Warna', 12),
('H53.6', 'Night blindness', 12),
('H54', 'Kebutaan & Penurunan tajam penglihatan', 12),
('H60', 'Otitis Externa', 13),
('H66', 'Otitis Media', 13),
('H70', 'Mastoiditis', 13),
('H73', 'Gangguan Membran timpani', 13),
('H83.3', 'Tuli Akibat Bising (Noise Induce Hearing  Loss)', 13),
('H90', 'Tuli Kongenital', 13),
('H91.1', 'Presbikusis', 13),
('H93.1', 'Tinitus', 13),
('H93.9', 'Gangguan telinga lain (Cerumen)', 13),
('I 64', 'CVA', 29),
('I09', 'Penyakit jantung rematik', 14),
('I10', 'Hipertensi Primer', 14),
('I11', 'HHD', 29),
('I15', 'Hipertensi Sekunder', 14),
('I20', 'Angina Pectoris', 14),
('I21', 'Infark Miokard Akut', 14),
('I21.9', 'Acut Myocardial infarction, unspecified', 29),
('I25', 'CAD', 29),
('I49', 'Gangguan irama Jantung', 14),
('I50', 'Gagal Jantung', 14),
('I63.9', 'Cerebral Infark', 29),
('I80', 'Phlebitis', 15),
('I83', 'Varises', 15),
('I84', 'Wasir (Hemorrhoid)', 15),
('I88', 'Lymphadenitis', 15),
('I96', 'Hipotensi', 14),
('J00', 'Infeksi Saluran Pernapasan Akut', 16),
('J01', 'Sinusitis', 16),
('J02', 'Pharingitis', 16),
('J03', 'Tonsilitis', 16),
('J04', 'Laringitis & tracheaitis', 16),
('J11', 'Influenza, virus tidak diidentifikasi', 16),
('J18', 'Pneumonia', 16),
('J20', 'Bronkhitis Akuta', 16),
('J21', 'Bronkhitis Khronika', 16),
('J30.4', 'Rhinitis alergi', 16),
('J33', 'Nasal polyp', 16),
('J44', 'COPD', 29),
('J44.9', 'COPD', 29),
('J45', 'Asma', 16),
('J46', 'Status Asmatikus', 16),
('J90', 'Efusi pleura', 16),
('J93', 'Pneumothorak', 16),
('J94', 'Pleuritis', 16),
('K.41.9', 'Hernia Femoral', 18),
('K.46.9', 'Hernia', 18),
('K00', 'PERSISTENSI', 17),
('K01', 'IMPAKSI', 29),
('K02', 'Carries Gigi', 17),
('K03', 'Calculus dan Deposit lain', 17),
('K04', 'Peny Pulpa & Jaringan Perapikal', 17),
('K05', 'Peny Gusi & Jaringan Periodental', 17),
('K06', 'Gangguan Gusi & Hubungan alveolar', 29),
('K07', 'Kelainan Dento Fasial termasuk Mal Oklusi', 17),
('K08', 'Gg gigi & struktur penyangga lain: strain, trauma', 17),
('K12', 'Stomatitis termasuk pada bibir dan mukosa mulut', 17),
('K25', 'Tukak lambung', 18),
('K29', 'Gastritis', 18),
('K30', 'Dyspepsia', 18),
('K35', 'Apendicitis Akut', 18),
('K74', 'Cirrhosis Hepatis', 18),
('K81.0', 'Cholecystitis akut', 18),
('K92.0', 'Haematemesis', 18),
('K92.1', 'Melena', 18),
('kode_icdx', 'nama_penyakit', 0),
('L01', 'Impetigo', 23),
('L02', 'Abses, Furuncle, Carbuncle', 23),
('L03', 'Cellulitis', 23),
('L04', 'Lymphadenitis Akuta', 23),
('L08', 'Pioderma', 23),
('L10.0', 'Pemphigus vulgaris', 29),
('L20', 'Atopic Dermatitis', 23),
('L21', 'Seborrhoic Dermatitis', 23),
('L22', 'Diaper Dermatitis', 23),
('L23', 'Derrmatitis  Kontak Alergi', 23),
('L24', 'Dermatitis Kontak Irritan', 23),
('L28', 'Lichen Simplex Chronic', 23),
('L29', 'Pruritus', 23),
('L30.3', 'Infective Derrmatitis', 23),
('L40', 'Psoriasis', 23),
('L42', 'Pityriasis Rosea', 23),
('L43', 'Lichen planus', 29),
('L50', 'Urticaria', 23),
('L60.0', 'Ingrowing Nail', 23),
('L70', 'Acne', 23),
('L74', 'Miliaria', 23),
('L80', 'vitiligo', 23),
('L84', 'Corns and callosities', 29),
('L89', 'Pressure ulcer', 29),
('M 79.1', 'Myalgia', 29),
('M06', 'Rheumatoid Arthritis', 24),
('M10', 'Gout', 24),
('M19', 'Osteoarthritis', 24),
('M25', 'Other joint disorder, not elsewhere classified', 29),
('M32', 'SLE', 24),
('M40', 'Kyphosis dan Lordosis', 24),
('M41', 'Scoliosis', 24),
('M51', 'HNP', 24),
('M53.1', 'CRS', 29),
('M54.5', 'LBP', 24),
('M65.3', 'TRYER FINGER', 29),
('M80', 'Osteoporosis dengan Fraktur', 24),
('M81', 'Osteoporosis tanpa Fraktur', 24),
('M86', 'Osteomyelitis', 24),
('N 39.0', 'ISK', 29),
('N04', 'Nephrotic Syndrome', 19),
('N08', 'GNA', 19),
('N17', 'Gagal Ginjal Akut', 19),
('N18', 'Gagal Ginjal Khronika', 19),
('N20', 'Batu Ginjal dan Ureter', 19),
('N21', 'Batu Sal. Kemih bagian bawah', 19),
('N23', 'Unspesified Renal Kolik', 19),
('N30', 'Cystitis', 19),
('N34', 'Urethritis', 19),
('N39', 'ISK', 29),
('N40', 'BPH', 19),
('N43', 'Hydrocele', 19),
('N45', 'Orchitis/ Epididimitis', 19),
('N47', 'Phymosis', 19),
('N60', 'Benign Mammary Displasia', 19),
('N61', 'Mastitis / Abscess', 19),
('N62', 'Gynaecomastia', 19),
('N73', 'Peradangan Pinggul (PID ) tidak spesifik', 19),
('N75', 'Diseases of Bartholin\'s Gland', 19),
('N76', 'Peradangan Vagena dan Vulva', 19),
('N83', 'KISTA', 29),
('N87', 'Carcinoma Cervix', 19),
('N89.8', 'Fluor Vaginalis', 19),
('N91', 'Amenorrhoe / Oligomenorrhea', 19),
('N92', 'Meno/metrorhagia', 19),
('N93.0', 'Post Coital Bleeding', 19),
('N94', 'Dysmenorrhoe', 19),
('N95', 'Menopause dan gejala ikutan lain', 19),
('O00', 'Kehamilan Ektopik', 20),
('O01', 'Mola Hidatidosa', 20),
('O02.0', 'Blighted ovum', 20),
('O03', 'Abortus Spontan', 20),
('O11', 'Superimposed pre-eclampsia', 20),
('O13', 'Pre-eclampsia ringan', 20),
('O14.0', 'Pre-eclampsia sedang', 20),
('O14.1', 'Pre-eclampsia berat', 20),
('O15', 'Eclampsia', 20),
('O20', 'Hemorrhage in early pregnancy', 20),
('O21', 'Hyperemesis Gravidarum', 20),
('O22', 'Gangguan Vena pada kehamilan', 20),
('O23', 'Infeksi Saluran Kencing Pada Kehamilan', 20),
('O24', 'Pregnancy & DM', 20),
('O25', 'Malnutrisi pada kehamilan', 20),
('O30', 'Multiple Gestation', 20),
('O40', 'Polyhidramnion', 20),
('O41', 'Oligohydramnion', 20),
('O42', 'PRM', 20),
('O44', 'Placenta Pravia', 20),
('O45', 'Solutio Placenta', 20),
('O46', 'Antepartum Bleeding ', 20),
('O48', 'Post Date', 20),
('O60', 'Preterm Delivery', 20),
('O61', 'Rintangan Persalinan : Induksi gagal', 20),
('O63', 'Rintangan Persalinan : Partus lama', 20),
('O64', 'Rintangan Persalinan : Malposisi', 20),
('O65', 'Rintangan Persalinan : abnormal pelvic', 20),
('O70', 'Perineal laseration', 20),
('O72', 'Pendarahan Pastportum', 20),
('O73', 'Retentio Placenta', 20),
('O80.0', 'Spontan Delivery (vertex)', 20),
('O81', 'Delivery  Forcep / Vacuum', 20),
('O82', 'SCTP', 20),
('O84', 'Multiple Delivery', 20),
('P01.5', 'Bayi lahir kembar dua atau lebih', 25),
('P01.7', 'Bayi lahir dengan malpresentasi', 25),
('P02', 'Bayi lahir dengan gangguan plasenta, tali pusat dan membran', 25),
('P03.4', 'Bayi Lahir dengan SC', 25),
('P03.6', 'Bayi lahir dengan gangguan kontraksi uteri', 25),
('P05', 'Taksiran berat janin tidak sesuai dengan usia kehamilan', 25),
('P07.1', 'BBLR', 25),
('P07.2', 'Imaturitas < 28 minggu', 25),
('P07.3 ', 'Preterm: UK 25-37 minggu', 25),
('P08.0', 'Berat badan lahir > 4500 gram', 25),
('P08.2', 'Bayi lahir post date', 25),
('P20', 'Intrauterine Hypoxia', 25),
('P21', 'Birth asphyxia', 25),
('P22', 'Respiratory distres of newborn', 25),
('P24', 'Neonatal aspiration syndromes', 25),
('P59.9', 'Neonatal Jaundice, unspesified', 25),
('P80', 'Hipothermia of newborn', 25),
('P95 ', 'Kematian fetus tidak jelas : lahir mati & IUFD', 25),
('Q03', 'Congenital hydrocephalus', 26),
('Q21', 'Kelainan Jantung Bawaan', 26),
('Q35', 'Cleft palate: palatum sumbing', 26),
('Q36', 'Cleft lip: bibir sumbing', 26),
('Q37', 'bibir dan palatum sumbing', 26),
('R00', 'Kelainan irama jantung', 27),
('R02', 'Gangrene, not elsewhere classified', 29),
('R04.0', 'Epistaxis', 27),
('R04.2', 'Batuk Darah', 27),
('R05', 'Batuk', 27),
('R06.0', 'Dyspnoe', 27),
('R06.2', 'Wheezing', 27),
('R06.6', 'Hiccouhg / cegukan', 27),
('R07.4', 'Chest pain, unspeccified', 27),
('R09.0', 'Asphyxia', 27),
('R10.0', 'Abdominal pain', 27),
('R11', 'Nause and Vomiting', 27),
('R12', 'Pain', 27),
('R14', 'Kembung', 27),
('R15', 'Obstipasi', 27),
('R16', 'Hepatomegaly and splenomegaly, not elsewhere clasified', 27),
('R18', 'Ascites', 27),
('R25.2', 'Kram dan kejang', 27),
('R33', 'Retention of urine', 27),
('R34', 'Anuria dan oliguria', 27),
('R35', 'Polyuria', 27),
('R42', 'Vertigo', 27),
('R50', 'Demam yang tidak diketahui sebabnya', 27),
('R51', 'Headache', 27),
('R52.9', 'Pain, unspecified', 29),
('R53', 'Lelah dan lesu', 27),
('R55', 'Syncope and collapse', 27),
('R56', 'Kejang demam', 27),
('R59', 'Pembesaran kelenjar getah bening', 27),
('R60', 'Oedema, not elsewhere classified', 27),
('R63.0', 'Anorexia', 27),
('S00', 'Trauma kepala superfisial', 22),
('S06', 'Trauma intrakranial misal : Comotio cerebri', 22),
('S12', 'Fraktur leher', 22),
('S13', 'Dislokasi sendi', 22),
('S20', 'Trauma Thorax', 22),
('S30', 'Trauma Abdomen', 22),
('S42', 'Fraktur bahu dan lengan atas', 22),
('S52', 'Fraktur lengan bawah', 22),
('S62', 'Fraktur pergelangan tangan dan telapak tangan ', 22),
('S72', 'Fraktur femur', 22),
('S82', 'Fraktur tibia,Fibula,Achiles', 22),
('S92', 'Fraktur telapak kaki', 22),
('T14', 'Trauma tidak disebut bagian tubuh', 22),
('T16', 'corpus alinum telinga', 29),
('T20', 'Luka bakar', 22),
('T43', 'Keracunan obat psikotropika yang tidak di klasifikasikan', 22),
('T50', 'Keracunan obat, Medikamentosa bahan etiologi', 22),
('T51', 'Keracunan alkohol', 22),
('T52', 'Keracunan bahan organik', 22),
('T60', 'Keracunan pestisida', 22),
('T62', 'Keracunan makanan', 22),
('T65', 'Keracunan bahan kimia', 22),
('V89', 'Kecelakaan lalu lintas', 22),
('W19', 'Jatuh', 22),
('W25', 'Kontak dengan kaca', 22),
('W26', 'Kontak dengan benda tajam', 22),
('W74', 'Tenggelam', 22),
('X29', 'Kontak dengan tanaman dan binatang beracun', 22),
('X39', 'Bencana alam, Gunung Api, Gempa bumi, Longsor, Banjir, dll.', 22),
('X84', 'Tindakan melukai diri sendiri termasuk bunuh diri', 22),
('Y05', 'Perkosaan', 22),
('Y07', 'Kecelakaan Kerja', 22),
('Y07.9', 'Kekerasan lain  kekerasan dalam rumah tangga ( KDRT )', 22),
('Z00.0', 'Pemeriksaan kesehatan', 28),
('Z00.2', 'Pemeriksaan Tumbuh Kembang', 28),
('Z01.0', 'Pemeriksaan Mata', 28),
('Z01.1', 'Pemeriksaan Telinga', 28),
('Z01.2', 'Pemeriksaan gigi', 28),
('Z01.3', 'Pemeriksaan tekanan darah', 28),
('Z01.4', 'Pemeriksaan Ginekologi termasuk Pap Smear', 28),
('Z01.6', 'Pemeriksaan Radiologi', 28),
('Z01.7', 'Pemeriksaan Laboratorium', 28),
('Z1', 'Donor Darah', 28),
('Z14.3', 'Tindakan', 28),
('Z14.9', 'Jahit Luka', 28),
('Z2', 'Oxygen', 28),
('Z20.6', 'Kontak dengan HIV', 29),
('Z23.2', 'BCG', 28),
('Z23.5.1', 'TT1 Calon Pengantin', 28),
('Z23.5.2', 'TT1 Ibu Hamil = T3', 28),
('Z23.5.3', 'TT Anak Sekolah', 28),
('Z23.56', 'DT Anak Sekolah', 28),
('Z23.6', 'Diphteria', 28),
('Z24.0', 'Polio', 28),
('Z24.1', 'Viral Encephalitis (MENINGITIS HAJI)', 28),
('Z24.4', 'Campak bayi', 28),
('Z24.6', 'Viral Hepatitis', 28),
('Z25.1', 'Influennza', 28),
('Z27.1', 'DPT', 28),
('Z3', 'Infus', 28),
('Z30.0', 'Konseling KB', 28),
('Z30.1', 'KB IUD', 28),
('Z30.2', 'KB Lestari Tubektomi/Vasektomi', 28),
('Z30.4', 'KB Hormonal', 28),
('Z30.5', 'Kontrol  IUD', 28),
('Z32', 'Tes Kehamilan', 28),
('Z34', 'Pemeriksaan Kehamilan Normal', 28),
('Z35', 'Resti Bumil', 28),
('Z37', 'Bayi lahir', 28),
('Z39', 'Perawatan Pospartum = masa nifas', 28),
('Z4', 'Doppler', 28),
('Z41.2', 'Sunat / Sirkumsisi', 28),
('Z48', 'Follow up tindakan operasi misal buka jahitan, buka pembalut dsb', 28),
('Z5', 'Tindakan lain-2', 28);

-- --------------------------------------------------------

--
-- Table structure for table `data_puskesmas`
--

CREATE TABLE `data_puskesmas` (
  `kd_puskesmas` int(10) NOT NULL,
  `nama_puskesmas` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_puskesmas`
--

INSERT INTO `data_puskesmas` (`kd_puskesmas`, `nama_puskesmas`, `kecamatan`, `kota`) VALUES
(501, 'Dinoyo', 'Lowokwaru', 'Malang');

-- --------------------------------------------------------

--
-- Table structure for table `detail_laporan`
--

CREATE TABLE `detail_laporan` (
  `id_laporan` int(10) NOT NULL,
  `id_jp` int(10) NOT NULL,
  `jenis_laporan` varchar(100) NOT NULL,
  `nama_puskesmas` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `datalb1` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_laporan`
--

INSERT INTO `detail_laporan` (`id_laporan`, `id_jp`, `jenis_laporan`, `nama_puskesmas`, `status`, `tanggal`, `datalb1`) VALUES
(4, 1, 'Bulanan', 'Dinoyo', '3', '2020-05-16', '[{\"pasien\":[],\"kode_dx\":\"1\",\"kode_icdx\":\"A00\",\"nama_penyakit\":\"Cholera\"},{\"pasien\":[],\"kode_dx\":\"1\",\"kode_icdx\":\"A01.0\",\"nama_penyakit\":\"Typhoid Fever\"},{\"pasien\":[],\"kode_dx\":\"1\",\"kode_icdx\":\"A03\",\"nama_penyakit\":\"Syghelosis\"},{\"pasien\":[],\"kode_dx\":\"1\",\"kode_icdx\":\"A06\",\"nama_penyakit\":\"Amoebiasis\"},{\"pasien\":[],\"kode_dx\":\"1\",\"kode_icdx\":\"A09\",\"nama_penyakit\":\"Diare\"},{\"pasien\":[{\"Baru\":{\"Perempuan\":0,\"Laki\":1},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":1,\"Laki\":0}},{\"Baru\":{\"Perempuan\":1,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}}],\"kode_dx\":\"2\",\"kode_icdx\":\"A14\",\"nama_penyakit\":\"TB Relaps \\/ Kategori II\"},{\"pasien\":[{\"Baru\":{\"Perempuan\":0,\"Laki\":1},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}}],\"kode_dx\":\"2\",\"kode_icdx\":\"A15\",\"nama_penyakit\":\"TB Paru BTA (+)\"},{\"pasien\":[],\"kode_dx\":\"2\",\"kode_icdx\":\"A16\",\"nama_penyakit\":\"TB Klinis  Termasuk Rongent (+) BTA (-)  \"},{\"pasien\":[{\"Baru\":{\"Perempuan\":3,\"Laki\":7},\"Lama\":{\"Perempuan\":0,\"Laki\":1},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":1,\"Laki\":2},\"Lama\":{\"Perempuan\":0,\"Laki\":1},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":1},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":1},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":1,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}}],\"kode_dx\":\"2\",\"kode_icdx\":\"A18\",\"nama_penyakit\":\"TB Organ Lain\"},{\"pasien\":[],\"kode_dx\":\"3\",\"kode_icdx\":\"A30\",\"nama_penyakit\":\"Lepra\"},{\"pasien\":[],\"kode_dx\":\"3\",\"kode_icdx\":\"A31\",\"nama_penyakit\":\"Kusta PB\"},{\"pasien\":[],\"kode_dx\":\"3\",\"kode_icdx\":\"A32\",\"nama_penyakit\":\"Kusta MB\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"A33\",\"nama_penyakit\":\"Tetanus Neonatorum\"},{\"pasien\":[],\"kode_dx\":\"3\",\"kode_icdx\":\"A35\",\"nama_penyakit\":\"Tetanus Lainnya\"},{\"pasien\":[],\"kode_dx\":\"3\",\"kode_icdx\":\"A36\",\"nama_penyakit\":\"Diphtheria\"},{\"pasien\":[],\"kode_dx\":\"3\",\"kode_icdx\":\"A37\",\"nama_penyakit\":\"Batuk Rejan\"},{\"pasien\":[],\"kode_dx\":\"6\",\"kode_icdx\":\"A51\",\"nama_penyakit\":\"Early syphilis\"},{\"pasien\":[],\"kode_dx\":\"6\",\"kode_icdx\":\"A52\",\"nama_penyakit\":\"Late syphilis\"},{\"pasien\":[],\"kode_dx\":\"6\",\"kode_icdx\":\"A53\",\"nama_penyakit\":\"Sipilis\"},{\"pasien\":[],\"kode_dx\":\"6\",\"kode_icdx\":\"A54\",\"nama_penyakit\":\"Infeksi Gonokok\"},{\"pasien\":[],\"kode_dx\":\"6\",\"kode_icdx\":\"A55\",\"nama_penyakit\":\"Chlamydial Lymphogranuloma venerum\"},{\"pasien\":[],\"kode_dx\":\"6\",\"kode_icdx\":\"A56\",\"nama_penyakit\":\"Non Gonokok\"},{\"pasien\":[],\"kode_dx\":\"6\",\"kode_icdx\":\"A59\",\"nama_penyakit\":\"TRICHOMONAS\"},{\"pasien\":[],\"kode_dx\":\"6\",\"kode_icdx\":\"A59.0\",\"nama_penyakit\":\"Urogenital trichomoniasis\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"A63.0\",\"nama_penyakit\":\"Condyloma accuminatum\"},{\"pasien\":[],\"kode_dx\":\"4\",\"kode_icdx\":\"A80\",\"nama_penyakit\":\"Acute Poliomyelitis\"},{\"pasien\":[],\"kode_dx\":\"4\",\"kode_icdx\":\"A90\",\"nama_penyakit\":\"Dengue  Fever\"},{\"pasien\":[],\"kode_dx\":\"4\",\"kode_icdx\":\"A91\",\"nama_penyakit\":\"Dengue Haemorrhagic fever\"},{\"pasien\":[],\"kode_dx\":\"4\",\"kode_icdx\":\"A92.0\",\"nama_penyakit\":\"Chikungunya virus diseasa\"},{\"pasien\":[],\"kode_dx\":\"4\",\"kode_icdx\":\"B00\",\"nama_penyakit\":\"Herpes simplex\"},{\"pasien\":[],\"kode_dx\":\"4\",\"kode_icdx\":\"B01\",\"nama_penyakit\":\"Varicella \"},{\"pasien\":[],\"kode_dx\":\"4\",\"kode_icdx\":\"B02\",\"nama_penyakit\":\"Herpes Zoster\"},{\"pasien\":[],\"kode_dx\":\"4\",\"kode_icdx\":\"B05\",\"nama_penyakit\":\"Morbili.\"},{\"pasien\":[],\"kode_dx\":\"4\",\"kode_icdx\":\"B07\",\"nama_penyakit\":\"Verruca vulgaris\"},{\"pasien\":[],\"kode_dx\":\"4\",\"kode_icdx\":\"B15\",\"nama_penyakit\":\"Acute Hepatitis A \"},{\"pasien\":[],\"kode_dx\":\"4\",\"kode_icdx\":\"B16\",\"nama_penyakit\":\"Acute hepatitis B \"},{\"pasien\":[],\"kode_dx\":\"4\",\"kode_icdx\":\"B17\",\"nama_penyakit\":\"Other Acute hepatitis\"},{\"pasien\":[],\"kode_dx\":\"4\",\"kode_icdx\":\"B18\",\"nama_penyakit\":\"Chronic viral hepatitis\"},{\"pasien\":[],\"kode_dx\":\"4\",\"kode_icdx\":\"B24\",\"nama_penyakit\":\"Unspecific HIV\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"B25\",\"nama_penyakit\":\"Cytomegaloviral pneumonitis\"},{\"pasien\":[],\"kode_dx\":\"4\",\"kode_icdx\":\"B26\",\"nama_penyakit\":\"Mumps\"},{\"pasien\":[],\"kode_dx\":\"7\",\"kode_icdx\":\"B35\",\"nama_penyakit\":\"Penyakit kulit karena jamur\"},{\"pasien\":[],\"kode_dx\":\"7\",\"kode_icdx\":\"B36.0\",\"nama_penyakit\":\"Pityriasis versicolour\"},{\"pasien\":[],\"kode_dx\":\"7\",\"kode_icdx\":\"B37.0\",\"nama_penyakit\":\"Candidal stomatitis\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"B40.0\",\"nama_penyakit\":\"Acute pulmonary blastomycosis\"},{\"pasien\":[],\"kode_dx\":\"5\",\"kode_icdx\":\"B50\",\"nama_penyakit\":\"Malaria Tropika (P Falciparum)\"},{\"pasien\":[],\"kode_dx\":\"5\",\"kode_icdx\":\"B51\",\"nama_penyakit\":\"Malaria Tertiana (P Vivax)\"},{\"pasien\":[],\"kode_dx\":\"5\",\"kode_icdx\":\"B54\",\"nama_penyakit\":\"Unspecified malaria. Clinically diagnosed malaria without\"},{\"pasien\":[],\"kode_dx\":\"5\",\"kode_icdx\":\"B55\",\"nama_penyakit\":\"parasitological confirmation.\"},{\"pasien\":[],\"kode_dx\":\"5\",\"kode_icdx\":\"B58\",\"nama_penyakit\":\"Toxoplasmosis\"},{\"pasien\":[],\"kode_dx\":\"7\",\"kode_icdx\":\"B74\",\"nama_penyakit\":\"Filariasis\"},{\"pasien\":[],\"kode_dx\":\"7\",\"kode_icdx\":\"B82.0\",\"nama_penyakit\":\"Intestinal helminthiasis\"},{\"pasien\":[],\"kode_dx\":\"7\",\"kode_icdx\":\"B86\",\"nama_penyakit\":\"Scabies.\"},{\"pasien\":[],\"kode_dx\":\"7\",\"kode_icdx\":\"B90\",\"nama_penyakit\":\"Gejala sisa dari TBC\"},{\"pasien\":[],\"kode_dx\":\"7\",\"kode_icdx\":\"B91\",\"nama_penyakit\":\"Gejala sisa dari poliomyelitis.\"},{\"pasien\":[],\"kode_dx\":\"7\",\"kode_icdx\":\"B92\",\"nama_penyakit\":\"Gejala sisa dari Kusta \\/ Lepra\"},{\"pasien\":[],\"kode_dx\":\"21\",\"kode_icdx\":\"C11\",\"nama_penyakit\":\"Tumor ganas : Nasopharynx\"},{\"pasien\":[],\"kode_dx\":\"21\",\"kode_icdx\":\"C18\",\"nama_penyakit\":\"Tumor Ganas : Usus Besar\"},{\"pasien\":[],\"kode_dx\":\"21\",\"kode_icdx\":\"C22\",\"nama_penyakit\":\"Ca Hepar\"},{\"pasien\":[],\"kode_dx\":\"21\",\"kode_icdx\":\"C34\",\"nama_penyakit\":\"Ca Paru-2\"},{\"pasien\":[],\"kode_dx\":\"21\",\"kode_icdx\":\"C50\",\"nama_penyakit\":\"Tumor ganas : Payudara\"},{\"pasien\":[],\"kode_dx\":\"21\",\"kode_icdx\":\"C53\",\"nama_penyakit\":\"Tumor ganas : Cervix\"},{\"pasien\":[],\"kode_dx\":\"21\",\"kode_icdx\":\"C61\",\"nama_penyakit\":\"Tumor ganas : Prostate\"},{\"pasien\":[],\"kode_dx\":\"21\",\"kode_icdx\":\"C76\",\"nama_penyakit\":\"Tumor ganas lain2\"},{\"pasien\":[],\"kode_dx\":\"21\",\"kode_icdx\":\"C95\",\"nama_penyakit\":\"Tumor ganas darah: Leukemia, Thalasemia\"},{\"pasien\":[],\"kode_dx\":\"21\",\"kode_icdx\":\"D17\",\"nama_penyakit\":\"Tumor jinak : Lipoma\"},{\"pasien\":[],\"kode_dx\":\"21\",\"kode_icdx\":\"D18\",\"nama_penyakit\":\"Tumor jinak : Hemangioma, Lymphangioma\"},{\"pasien\":[],\"kode_dx\":\"21\",\"kode_icdx\":\"D22\",\"nama_penyakit\":\"Tumor jinak : Melanocyclic Naevy\"},{\"pasien\":[],\"kode_dx\":\"21\",\"kode_icdx\":\"D24\",\"nama_penyakit\":\"Tumor jinak : Payudara\"},{\"pasien\":[],\"kode_dx\":\"21\",\"kode_icdx\":\"D25\",\"nama_penyakit\":\"Tumor jinak : Myoma\"},{\"pasien\":[],\"kode_dx\":\"21\",\"kode_icdx\":\"D27\",\"nama_penyakit\":\"Tumor jinak : Ovarium\"},{\"pasien\":[],\"kode_dx\":\"21\",\"kode_icdx\":\"D36\",\"nama_penyakit\":\"Tumor jinak : lain-2\"},{\"pasien\":[],\"kode_dx\":\"9\",\"kode_icdx\":\"D50\",\"nama_penyakit\":\"Anemia: Deff Fe\"},{\"pasien\":[],\"kode_dx\":\"9\",\"kode_icdx\":\"D51\",\"nama_penyakit\":\"Anemia :Deff B12\"},{\"pasien\":[],\"kode_dx\":\"9\",\"kode_icdx\":\"D52\",\"nama_penyakit\":\"Anemia: Asam Folat\"},{\"pasien\":[],\"kode_dx\":\"9\",\"kode_icdx\":\"D53\",\"nama_penyakit\":\"Anemia lain\"},{\"pasien\":[],\"kode_dx\":\"8\",\"kode_icdx\":\"E01\",\"nama_penyakit\":\"GAKI: Gondok Endemik: STRUMA\"},{\"pasien\":[],\"kode_dx\":\"8\",\"kode_icdx\":\"E05\",\"nama_penyakit\":\"Hipertiroidisme\"},{\"pasien\":[],\"kode_dx\":\"8\",\"kode_icdx\":\"E10\",\"nama_penyakit\":\"Type 1: Insulin dependen DM\"},{\"pasien\":[],\"kode_dx\":\"8\",\"kode_icdx\":\"E11\",\"nama_penyakit\":\"Type 2: Non insulin dependen DM\"},{\"pasien\":[],\"kode_dx\":\"9\",\"kode_icdx\":\"E16.2\",\"nama_penyakit\":\"Hypoglycaemia\"},{\"pasien\":[],\"kode_dx\":\"9\",\"kode_icdx\":\"E40\",\"nama_penyakit\":\"Kwashiorkor\"},{\"pasien\":[],\"kode_dx\":\"9\",\"kode_icdx\":\"E41\",\"nama_penyakit\":\"Nutritional marasmus\"},{\"pasien\":[],\"kode_dx\":\"9\",\"kode_icdx\":\"E42\",\"nama_penyakit\":\"Marasmic kwashiorkor\"},{\"pasien\":[],\"kode_dx\":\"12\",\"kode_icdx\":\"E50.7\",\"nama_penyakit\":\"Xerophtalmia\"},{\"pasien\":[],\"kode_dx\":\"9\",\"kode_icdx\":\"E66\",\"nama_penyakit\":\"Obesity\"},{\"pasien\":[],\"kode_dx\":\"9\",\"kode_icdx\":\"E78.0\",\"nama_penyakit\":\"Pure hypercholesterolaemia\"},{\"pasien\":[],\"kode_dx\":\"9\",\"kode_icdx\":\"E78.5\",\"nama_penyakit\":\"Hyperlipidaemia\"},{\"pasien\":[],\"kode_dx\":\"9\",\"kode_icdx\":\"E79\",\"nama_penyakit\":\"Gangguan Metabolisme purin pyrimidin\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F03\",\"nama_penyakit\":\"Dimensia unspecified\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F05\",\"nama_penyakit\":\"Delirium\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F10\",\"nama_penyakit\":\"Penyalahgunaan Alkohol\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F17\",\"nama_penyakit\":\"Penyalahgunaan tembakau\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F19\",\"nama_penyakit\":\"Penyalahgunaan Narkoba\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F20\",\"nama_penyakit\":\"Schizophrenia\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F29\",\"nama_penyakit\":\"Gangguan psikotik\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F31\",\"nama_penyakit\":\"Gangguan Bipolar\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F32\",\"nama_penyakit\":\"Gangguan Depresif\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F40\",\"nama_penyakit\":\"Gangguan Fobik\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F41\",\"nama_penyakit\":\"Gangguan Panik\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F41.1\",\"nama_penyakit\":\"Gangguan Anxietas\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F41.2\",\"nama_penyakit\":\"Gangguan Campuran Anxietas & Depresif \"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F42\",\"nama_penyakit\":\"Gangguan Obsesif Kompulsif\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F43.2\",\"nama_penyakit\":\"Gangguan Penyesuaian\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F45\",\"nama_penyakit\":\"Gangguan Somatoform\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F48\",\"nama_penyakit\":\"Gangguan Neurotik\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F50.0\",\"nama_penyakit\":\"Anoreksia nervosa\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"F51.0\",\"nama_penyakit\":\"INSOMNIA Non Organik\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F52\",\"nama_penyakit\":\"Gangguan Seksual pada Pria dan Wanita\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F53\",\"nama_penyakit\":\"Ganguan Jiwa & Perilaku yang berhubungan dengan Masa Nifas\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F69\",\"nama_penyakit\":\"Gangguan kepribadian\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F79\",\"nama_penyakit\":\"Retardasi Mental\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F84\",\"nama_penyakit\":\"Gangguan Perkembangan Pervasif\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F90\",\"nama_penyakit\":\"Gangguan Hiperkinetik\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F91\",\"nama_penyakit\":\"Gangguan Tingkah Laku\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F98\",\"nama_penyakit\":\"Gangguan jiwa bermula pada bayi, anak\\/remaja\"},{\"pasien\":[],\"kode_dx\":\"11\",\"kode_icdx\":\"G03.9\",\"nama_penyakit\":\"Meningitis,  \"},{\"pasien\":[],\"kode_dx\":\"11\",\"kode_icdx\":\"G04.9\",\"nama_penyakit\":\"Encephalitis, \"},{\"pasien\":[],\"kode_dx\":\"11\",\"kode_icdx\":\"G20\",\"nama_penyakit\":\"Parkinson\'s\"},{\"pasien\":[],\"kode_dx\":\"11\",\"kode_icdx\":\"G30\",\"nama_penyakit\":\"Alzheimer\"},{\"pasien\":[],\"kode_dx\":\"11\",\"kode_icdx\":\"G35\",\"nama_penyakit\":\"Multiple sklerosis\"},{\"pasien\":[],\"kode_dx\":\"11\",\"kode_icdx\":\"G40\",\"nama_penyakit\":\"Epilepsi\"},{\"pasien\":[],\"kode_dx\":\"11\",\"kode_icdx\":\"G41\",\"nama_penyakit\":\"Status epilepticus\"},{\"pasien\":[],\"kode_dx\":\"11\",\"kode_icdx\":\"G43\",\"nama_penyakit\":\"Migraina\"},{\"pasien\":[],\"kode_dx\":\"11\",\"kode_icdx\":\"G44.2\",\"nama_penyakit\":\"Tension Headache\"},{\"pasien\":[],\"kode_dx\":\"11\",\"kode_icdx\":\"G47\",\"nama_penyakit\":\"Gangguan tidur\"},{\"pasien\":[],\"kode_dx\":\"11\",\"kode_icdx\":\"G51.0\",\"nama_penyakit\":\"Bell\'s Palsy\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"G54.2\",\"nama_penyakit\":\"CRS\"},{\"pasien\":[],\"kode_dx\":\"11\",\"kode_icdx\":\"G62\",\"nama_penyakit\":\"Polineuropathy\"},{\"pasien\":[],\"kode_dx\":\"11\",\"kode_icdx\":\"G80\",\"nama_penyakit\":\"Cerebral Palsy\"},{\"pasien\":[],\"kode_dx\":\"11\",\"kode_icdx\":\"G81\",\"nama_penyakit\":\"Hemiplegia\"},{\"pasien\":[],\"kode_dx\":\"11\",\"kode_icdx\":\"G82\",\"nama_penyakit\":\"Paraplegia dan Tetraplegia\"},{\"pasien\":[],\"kode_dx\":\"11\",\"kode_icdx\":\"G89\",\"nama_penyakit\":\"Acute Flaccid Paralysis (LUMPUH LAYU AKUTA)\"},{\"pasien\":[],\"kode_dx\":\"11\",\"kode_icdx\":\"G91\",\"nama_penyakit\":\"Hydrocephalus\"},{\"pasien\":[],\"kode_dx\":\"12\",\"kode_icdx\":\"H00\",\"nama_penyakit\":\"Hordeolum (Bintilan)\"},{\"pasien\":[],\"kode_dx\":\"12\",\"kode_icdx\":\"H01\",\"nama_penyakit\":\"Peradangan Kelopak mata\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"H02\",\"nama_penyakit\":\"Other disorders of eyelid\"},{\"pasien\":[],\"kode_dx\":\"12\",\"kode_icdx\":\"H04\",\"nama_penyakit\":\"Kelainan pada sistem kelenjar air mata\"},{\"pasien\":[],\"kode_dx\":\"12\",\"kode_icdx\":\"H10\",\"nama_penyakit\":\"Conjunctivitis\"},{\"pasien\":[],\"kode_dx\":\"12\",\"kode_icdx\":\"H11\",\"nama_penyakit\":\"Pterigium\"},{\"pasien\":[],\"kode_dx\":\"12\",\"kode_icdx\":\"H16\",\"nama_penyakit\":\"Kerattitis\"},{\"pasien\":[],\"kode_dx\":\"12\",\"kode_icdx\":\"H18\",\"nama_penyakit\":\"Kekeruhan Kornea\"},{\"pasien\":[],\"kode_dx\":\"12\",\"kode_icdx\":\"H20\",\"nama_penyakit\":\"Iridociclitis\\/ Uveitis\"},{\"pasien\":[],\"kode_dx\":\"12\",\"kode_icdx\":\"H26\",\"nama_penyakit\":\"Katarak\"},{\"pasien\":[],\"kode_dx\":\"12\",\"kode_icdx\":\"H40\",\"nama_penyakit\":\"Glaukoma\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"H50.2\",\"nama_penyakit\":\"HIPERROPIA\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"H52\",\"nama_penyakit\":\"Disorders of refraction and accommodation\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"H52.1\",\"nama_penyakit\":\"MIOPIA\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"H52.2\",\"nama_penyakit\":\"ASTIGMASMUS\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"H52.4\",\"nama_penyakit\":\"PRESBIOPIA\"},{\"pasien\":[],\"kode_dx\":\"12\",\"kode_icdx\":\"H53.5\",\"nama_penyakit\":\"Buta Warna\"},{\"pasien\":[],\"kode_dx\":\"12\",\"kode_icdx\":\"H53.6\",\"nama_penyakit\":\"Night blindness\"},{\"pasien\":[],\"kode_dx\":\"12\",\"kode_icdx\":\"H54\",\"nama_penyakit\":\"Kebutaan & Penurunan tajam penglihatan\"},{\"pasien\":[],\"kode_dx\":\"13\",\"kode_icdx\":\"H60\",\"nama_penyakit\":\"Otitis Externa\"},{\"pasien\":[],\"kode_dx\":\"13\",\"kode_icdx\":\"H66\",\"nama_penyakit\":\"Otitis Media\"},{\"pasien\":[],\"kode_dx\":\"13\",\"kode_icdx\":\"H70\",\"nama_penyakit\":\"Mastoiditis\"},{\"pasien\":[],\"kode_dx\":\"13\",\"kode_icdx\":\"H73\",\"nama_penyakit\":\"Gangguan Membran timpani\"},{\"pasien\":[],\"kode_dx\":\"13\",\"kode_icdx\":\"H83.3\",\"nama_penyakit\":\"Tuli Akibat Bising (Noise Induce Hearing  Loss)\"},{\"pasien\":[],\"kode_dx\":\"13\",\"kode_icdx\":\"H90\",\"nama_penyakit\":\"Tuli Kongenital\"},{\"pasien\":[],\"kode_dx\":\"13\",\"kode_icdx\":\"H91.1\",\"nama_penyakit\":\"Presbikusis\"},{\"pasien\":[],\"kode_dx\":\"13\",\"kode_icdx\":\"H93.1\",\"nama_penyakit\":\"Tinitus\"},{\"pasien\":[],\"kode_dx\":\"13\",\"kode_icdx\":\"H93.9\",\"nama_penyakit\":\"Gangguan telinga lain (Cerumen)\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"I 64\",\"nama_penyakit\":\"CVA\"},{\"pasien\":[],\"kode_dx\":\"14\",\"kode_icdx\":\"I09\",\"nama_penyakit\":\"Penyakit jantung rematik\"},{\"pasien\":[],\"kode_dx\":\"14\",\"kode_icdx\":\"I10\",\"nama_penyakit\":\"Hipertensi Primer\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"I11\",\"nama_penyakit\":\"HHD\"},{\"pasien\":[],\"kode_dx\":\"14\",\"kode_icdx\":\"I15\",\"nama_penyakit\":\"Hipertensi Sekunder\"},{\"pasien\":[],\"kode_dx\":\"14\",\"kode_icdx\":\"I20\",\"nama_penyakit\":\"Angina Pectoris\"},{\"pasien\":[],\"kode_dx\":\"14\",\"kode_icdx\":\"I21\",\"nama_penyakit\":\"Infark Miokard Akut\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"I21.9\",\"nama_penyakit\":\"Acut Myocardial infarction, unspecified\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"I25\",\"nama_penyakit\":\"CAD\"},{\"pasien\":[],\"kode_dx\":\"14\",\"kode_icdx\":\"I49\",\"nama_penyakit\":\"Gangguan irama Jantung\"},{\"pasien\":[],\"kode_dx\":\"14\",\"kode_icdx\":\"I50\",\"nama_penyakit\":\"Gagal Jantung\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"I63.9\",\"nama_penyakit\":\"Cerebral Infark\"},{\"pasien\":[],\"kode_dx\":\"15\",\"kode_icdx\":\"I80\",\"nama_penyakit\":\"Phlebitis\"},{\"pasien\":[],\"kode_dx\":\"15\",\"kode_icdx\":\"I83\",\"nama_penyakit\":\"Varises\"},{\"pasien\":[],\"kode_dx\":\"15\",\"kode_icdx\":\"I84\",\"nama_penyakit\":\"Wasir (Hemorrhoid)\"},{\"pasien\":[],\"kode_dx\":\"15\",\"kode_icdx\":\"I88\",\"nama_penyakit\":\"Lymphadenitis\"},{\"pasien\":[],\"kode_dx\":\"14\",\"kode_icdx\":\"I96\",\"nama_penyakit\":\"Hipotensi\"},{\"pasien\":[],\"kode_dx\":\"16\",\"kode_icdx\":\"J00\",\"nama_penyakit\":\"Infeksi Saluran Pernapasan Akut\"},{\"pasien\":[],\"kode_dx\":\"16\",\"kode_icdx\":\"J01\",\"nama_penyakit\":\"Sinusitis\"},{\"pasien\":[],\"kode_dx\":\"16\",\"kode_icdx\":\"J02\",\"nama_penyakit\":\"Pharingitis\"},{\"pasien\":[],\"kode_dx\":\"16\",\"kode_icdx\":\"J03\",\"nama_penyakit\":\"Tonsilitis\"},{\"pasien\":[],\"kode_dx\":\"16\",\"kode_icdx\":\"J04\",\"nama_penyakit\":\"Laringitis & tracheaitis\"},{\"pasien\":[],\"kode_dx\":\"16\",\"kode_icdx\":\"J11\",\"nama_penyakit\":\"Influenza, virus tidak diidentifikasi\"},{\"pasien\":[],\"kode_dx\":\"16\",\"kode_icdx\":\"J18\",\"nama_penyakit\":\"Pneumonia\"},{\"pasien\":[],\"kode_dx\":\"16\",\"kode_icdx\":\"J20\",\"nama_penyakit\":\"Bronkhitis Akuta\"},{\"pasien\":[],\"kode_dx\":\"16\",\"kode_icdx\":\"J21\",\"nama_penyakit\":\"Bronkhitis Khronika\"},{\"pasien\":[],\"kode_dx\":\"16\",\"kode_icdx\":\"J30.4\",\"nama_penyakit\":\"Rhinitis alergi\"},{\"pasien\":[],\"kode_dx\":\"16\",\"kode_icdx\":\"J33\",\"nama_penyakit\":\"Nasal polyp\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"J44\",\"nama_penyakit\":\"COPD\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"J44.9\",\"nama_penyakit\":\"COPD\"},{\"pasien\":[],\"kode_dx\":\"16\",\"kode_icdx\":\"J45\",\"nama_penyakit\":\"Asma\"},{\"pasien\":[],\"kode_dx\":\"16\",\"kode_icdx\":\"J46\",\"nama_penyakit\":\"Status Asmatikus\"},{\"pasien\":[],\"kode_dx\":\"16\",\"kode_icdx\":\"J90\",\"nama_penyakit\":\"Efusi pleura\"},{\"pasien\":[],\"kode_dx\":\"16\",\"kode_icdx\":\"J93\",\"nama_penyakit\":\"Pneumothorak\"},{\"pasien\":[],\"kode_dx\":\"16\",\"kode_icdx\":\"J94\",\"nama_penyakit\":\"Pleuritis\"},{\"pasien\":[],\"kode_dx\":\"18\",\"kode_icdx\":\"K.41.9\",\"nama_penyakit\":\"Hernia Femoral\"},{\"pasien\":[],\"kode_dx\":\"18\",\"kode_icdx\":\"K.46.9\",\"nama_penyakit\":\"Hernia\"},{\"pasien\":[],\"kode_dx\":\"17\",\"kode_icdx\":\"K00\",\"nama_penyakit\":\"PERSISTENSI\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"K01\",\"nama_penyakit\":\"IMPAKSI\"},{\"pasien\":[],\"kode_dx\":\"17\",\"kode_icdx\":\"K02\",\"nama_penyakit\":\"Carries Gigi\"},{\"pasien\":[],\"kode_dx\":\"17\",\"kode_icdx\":\"K03\",\"nama_penyakit\":\"Calculus dan Deposit lain\"},{\"pasien\":[],\"kode_dx\":\"17\",\"kode_icdx\":\"K04\",\"nama_penyakit\":\"Peny Pulpa & Jaringan Perapikal\"},{\"pasien\":[],\"kode_dx\":\"17\",\"kode_icdx\":\"K05\",\"nama_penyakit\":\"Peny Gusi & Jaringan Periodental\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"K06\",\"nama_penyakit\":\"Gangguan Gusi & Hubungan alveolar\"},{\"pasien\":[],\"kode_dx\":\"17\",\"kode_icdx\":\"K07\",\"nama_penyakit\":\"Kelainan Dento Fasial termasuk Mal Oklusi\"},{\"pasien\":[],\"kode_dx\":\"17\",\"kode_icdx\":\"K08\",\"nama_penyakit\":\"Gg gigi & struktur penyangga lain: strain, trauma\"},{\"pasien\":[],\"kode_dx\":\"17\",\"kode_icdx\":\"K12\",\"nama_penyakit\":\"Stomatitis termasuk pada bibir dan mukosa mulut\"},{\"pasien\":[],\"kode_dx\":\"18\",\"kode_icdx\":\"K25\",\"nama_penyakit\":\"Tukak lambung\"},{\"pasien\":[],\"kode_dx\":\"18\",\"kode_icdx\":\"K29\",\"nama_penyakit\":\"Gastritis\"},{\"pasien\":[],\"kode_dx\":\"18\",\"kode_icdx\":\"K30\",\"nama_penyakit\":\"Dyspepsia\"},{\"pasien\":[],\"kode_dx\":\"18\",\"kode_icdx\":\"K35\",\"nama_penyakit\":\"Apendicitis Akut\"},{\"pasien\":[],\"kode_dx\":\"18\",\"kode_icdx\":\"K74\",\"nama_penyakit\":\"Cirrhosis Hepatis\"},{\"pasien\":[],\"kode_dx\":\"18\",\"kode_icdx\":\"K81.0\",\"nama_penyakit\":\"Cholecystitis akut\"},{\"pasien\":[],\"kode_dx\":\"18\",\"kode_icdx\":\"K92.0\",\"nama_penyakit\":\"Haematemesis\"},{\"pasien\":[],\"kode_dx\":\"18\",\"kode_icdx\":\"K92.1\",\"nama_penyakit\":\"Melena\"},{\"pasien\":[],\"kode_dx\":\"0\",\"kode_icdx\":\"kode_icdx\",\"nama_penyakit\":\"nama_penyakit\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L01\",\"nama_penyakit\":\"Impetigo\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L02\",\"nama_penyakit\":\"Abses, Furuncle, Carbuncle\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L03\",\"nama_penyakit\":\"Cellulitis\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L04\",\"nama_penyakit\":\"Lymphadenitis Akuta\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L08\",\"nama_penyakit\":\"Pioderma\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"L10.0\",\"nama_penyakit\":\"Pemphigus vulgaris\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L20\",\"nama_penyakit\":\"Atopic Dermatitis\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L21\",\"nama_penyakit\":\"Seborrhoic Dermatitis\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L22\",\"nama_penyakit\":\"Diaper Dermatitis\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L23\",\"nama_penyakit\":\"Derrmatitis  Kontak Alergi\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L24\",\"nama_penyakit\":\"Dermatitis Kontak Irritan\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L28\",\"nama_penyakit\":\"Lichen Simplex Chronic\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L29\",\"nama_penyakit\":\"Pruritus\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L30.3\",\"nama_penyakit\":\"Infective Derrmatitis\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L40\",\"nama_penyakit\":\"Psoriasis\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L42\",\"nama_penyakit\":\"Pityriasis Rosea\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"L43\",\"nama_penyakit\":\"Lichen planus\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L50\",\"nama_penyakit\":\"Urticaria\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L60.0\",\"nama_penyakit\":\"Ingrowing Nail\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L70\",\"nama_penyakit\":\"Acne\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L74\",\"nama_penyakit\":\"Miliaria\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L80\",\"nama_penyakit\":\"vitiligo\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"L84\",\"nama_penyakit\":\"Corns and callosities\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"L89\",\"nama_penyakit\":\"Pressure ulcer\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"M 79.1\",\"nama_penyakit\":\"Myalgia\"},{\"pasien\":[],\"kode_dx\":\"24\",\"kode_icdx\":\"M06\",\"nama_penyakit\":\"Rheumatoid Arthritis\"},{\"pasien\":[],\"kode_dx\":\"24\",\"kode_icdx\":\"M10\",\"nama_penyakit\":\"Gout\"},{\"pasien\":[],\"kode_dx\":\"24\",\"kode_icdx\":\"M19\",\"nama_penyakit\":\"Osteoarthritis\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"M25\",\"nama_penyakit\":\"Other joint disorder, not elsewhere classified\"},{\"pasien\":[],\"kode_dx\":\"24\",\"kode_icdx\":\"M32\",\"nama_penyakit\":\"SLE\"},{\"pasien\":[],\"kode_dx\":\"24\",\"kode_icdx\":\"M40\",\"nama_penyakit\":\"Kyphosis dan Lordosis\"},{\"pasien\":[],\"kode_dx\":\"24\",\"kode_icdx\":\"M41\",\"nama_penyakit\":\"Scoliosis\"},{\"pasien\":[],\"kode_dx\":\"24\",\"kode_icdx\":\"M51\",\"nama_penyakit\":\"HNP\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"M53.1\",\"nama_penyakit\":\"CRS\"},{\"pasien\":[],\"kode_dx\":\"24\",\"kode_icdx\":\"M54.5\",\"nama_penyakit\":\"LBP\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"M65.3\",\"nama_penyakit\":\"TRYER FINGER\"},{\"pasien\":[],\"kode_dx\":\"24\",\"kode_icdx\":\"M80\",\"nama_penyakit\":\"Osteoporosis dengan Fraktur\"},{\"pasien\":[],\"kode_dx\":\"24\",\"kode_icdx\":\"M81\",\"nama_penyakit\":\"Osteoporosis tanpa Fraktur\"},{\"pasien\":[],\"kode_dx\":\"24\",\"kode_icdx\":\"M86\",\"nama_penyakit\":\"Osteomyelitis\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"N 39.0\",\"nama_penyakit\":\"ISK\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N04\",\"nama_penyakit\":\"Nephrotic Syndrome\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N08\",\"nama_penyakit\":\"GNA\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N17\",\"nama_penyakit\":\"Gagal Ginjal Akut\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N18\",\"nama_penyakit\":\"Gagal Ginjal Khronika\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N20\",\"nama_penyakit\":\"Batu Ginjal dan Ureter\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N21\",\"nama_penyakit\":\"Batu Sal. Kemih bagian bawah\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N23\",\"nama_penyakit\":\"Unspesified Renal Kolik\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N30\",\"nama_penyakit\":\"Cystitis\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N34\",\"nama_penyakit\":\"Urethritis\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"N39\",\"nama_penyakit\":\"ISK\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N40\",\"nama_penyakit\":\"BPH\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N43\",\"nama_penyakit\":\"Hydrocele\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N45\",\"nama_penyakit\":\"Orchitis\\/ Epididimitis\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N47\",\"nama_penyakit\":\"Phymosis\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N60\",\"nama_penyakit\":\"Benign Mammary Displasia\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N61\",\"nama_penyakit\":\"Mastitis \\/ Abscess\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N62\",\"nama_penyakit\":\"Gynaecomastia\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N73\",\"nama_penyakit\":\"Peradangan Pinggul (PID ) tidak spesifik\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N75\",\"nama_penyakit\":\"Diseases of Bartholin\'s Gland\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N76\",\"nama_penyakit\":\"Peradangan Vagena dan Vulva\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"N83\",\"nama_penyakit\":\"KISTA\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N87\",\"nama_penyakit\":\"Carcinoma Cervix\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N89.8\",\"nama_penyakit\":\"Fluor Vaginalis\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N91\",\"nama_penyakit\":\"Amenorrhoe \\/ Oligomenorrhea\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N92\",\"nama_penyakit\":\"Meno\\/metrorhagia\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N93.0\",\"nama_penyakit\":\"Post Coital Bleeding\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N94\",\"nama_penyakit\":\"Dysmenorrhoe\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N95\",\"nama_penyakit\":\"Menopause dan gejala ikutan lain\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O00\",\"nama_penyakit\":\"Kehamilan Ektopik\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O01\",\"nama_penyakit\":\"Mola Hidatidosa\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O02.0\",\"nama_penyakit\":\"Blighted ovum\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O03\",\"nama_penyakit\":\"Abortus Spontan\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O11\",\"nama_penyakit\":\"Superimposed pre-eclampsia\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O13\",\"nama_penyakit\":\"Pre-eclampsia ringan\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O14.0\",\"nama_penyakit\":\"Pre-eclampsia sedang\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O14.1\",\"nama_penyakit\":\"Pre-eclampsia berat\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O15\",\"nama_penyakit\":\"Eclampsia\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O20\",\"nama_penyakit\":\"Hemorrhage in early pregnancy\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O21\",\"nama_penyakit\":\"Hyperemesis Gravidarum\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O22\",\"nama_penyakit\":\"Gangguan Vena pada kehamilan\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O23\",\"nama_penyakit\":\"Infeksi Saluran Kencing Pada Kehamilan\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O24\",\"nama_penyakit\":\"Pregnancy & DM\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O25\",\"nama_penyakit\":\"Malnutrisi pada kehamilan\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O30\",\"nama_penyakit\":\"Multiple Gestation\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O40\",\"nama_penyakit\":\"Polyhidramnion\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O41\",\"nama_penyakit\":\"Oligohydramnion\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O42\",\"nama_penyakit\":\"PRM\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O44\",\"nama_penyakit\":\"Placenta Pravia\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O45\",\"nama_penyakit\":\"Solutio Placenta\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O46\",\"nama_penyakit\":\"Antepartum Bleeding \"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O48\",\"nama_penyakit\":\"Post Date\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O60\",\"nama_penyakit\":\"Preterm Delivery\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O61\",\"nama_penyakit\":\"Rintangan Persalinan : Induksi gagal\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O63\",\"nama_penyakit\":\"Rintangan Persalinan : Partus lama\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O64\",\"nama_penyakit\":\"Rintangan Persalinan : Malposisi\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O65\",\"nama_penyakit\":\"Rintangan Persalinan : abnormal pelvic\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O70\",\"nama_penyakit\":\"Perineal laseration\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O72\",\"nama_penyakit\":\"Pendarahan Pastportum\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O73\",\"nama_penyakit\":\"Retentio Placenta\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O80.0\",\"nama_penyakit\":\"Spontan Delivery (vertex)\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O81\",\"nama_penyakit\":\"Delivery  Forcep \\/ Vacuum\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O82\",\"nama_penyakit\":\"SCTP\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O84\",\"nama_penyakit\":\"Multiple Delivery\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P01.5\",\"nama_penyakit\":\"Bayi lahir kembar dua atau lebih\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P01.7\",\"nama_penyakit\":\"Bayi lahir dengan malpresentasi\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P02\",\"nama_penyakit\":\"Bayi lahir dengan gangguan plasenta, tali pusat dan membran\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P03.4\",\"nama_penyakit\":\"Bayi Lahir dengan SC\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P03.6\",\"nama_penyakit\":\"Bayi lahir dengan gangguan kontraksi uteri\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P05\",\"nama_penyakit\":\"Taksiran berat janin tidak sesuai dengan usia kehamilan\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P07.1\",\"nama_penyakit\":\"BBLR\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P07.2\",\"nama_penyakit\":\"Imaturitas < 28 minggu\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P07.3 \",\"nama_penyakit\":\"Preterm: UK 25-37 minggu\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P08.0\",\"nama_penyakit\":\"Berat badan lahir > 4500 gram\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P08.2\",\"nama_penyakit\":\"Bayi lahir post date\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P20\",\"nama_penyakit\":\"Intrauterine Hypoxia\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P21\",\"nama_penyakit\":\"Birth asphyxia\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P22\",\"nama_penyakit\":\"Respiratory distres of newborn\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P24\",\"nama_penyakit\":\"Neonatal aspiration syndromes\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P59.9\",\"nama_penyakit\":\"Neonatal Jaundice, unspesified\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P80\",\"nama_penyakit\":\"Hipothermia of newborn\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P95 \",\"nama_penyakit\":\"Kematian fetus tidak jelas : lahir mati & IUFD\"},{\"pasien\":[],\"kode_dx\":\"26\",\"kode_icdx\":\"Q03\",\"nama_penyakit\":\"Congenital hydrocephalus\"},{\"pasien\":[],\"kode_dx\":\"26\",\"kode_icdx\":\"Q21\",\"nama_penyakit\":\"Kelainan Jantung Bawaan\"},{\"pasien\":[],\"kode_dx\":\"26\",\"kode_icdx\":\"Q35\",\"nama_penyakit\":\"Cleft palate: palatum sumbing\"},{\"pasien\":[],\"kode_dx\":\"26\",\"kode_icdx\":\"Q36\",\"nama_penyakit\":\"Cleft lip: bibir sumbing\"},{\"pasien\":[],\"kode_dx\":\"26\",\"kode_icdx\":\"Q37\",\"nama_penyakit\":\"bibir dan palatum sumbing\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R00\",\"nama_penyakit\":\"Kelainan irama jantung\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"R02\",\"nama_penyakit\":\"Gangrene, not elsewhere classified\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R04.0\",\"nama_penyakit\":\"Epistaxis\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R04.2\",\"nama_penyakit\":\"Batuk Darah\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R05\",\"nama_penyakit\":\"Batuk\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R06.0\",\"nama_penyakit\":\"Dyspnoe\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R06.2\",\"nama_penyakit\":\"Wheezing\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R06.6\",\"nama_penyakit\":\"Hiccouhg \\/ cegukan\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R07.4\",\"nama_penyakit\":\"Chest pain, unspeccified\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R09.0\",\"nama_penyakit\":\"Asphyxia\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R10.0\",\"nama_penyakit\":\"Abdominal pain\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R11\",\"nama_penyakit\":\"Nause and Vomiting\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R12\",\"nama_penyakit\":\"Pain\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R14\",\"nama_penyakit\":\"Kembung\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R15\",\"nama_penyakit\":\"Obstipasi\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R16\",\"nama_penyakit\":\"Hepatomegaly and splenomegaly, not elsewhere clasified\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R18\",\"nama_penyakit\":\"Ascites\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R25.2\",\"nama_penyakit\":\"Kram dan kejang\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R33\",\"nama_penyakit\":\"Retention of urine\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R34\",\"nama_penyakit\":\"Anuria dan oliguria\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R35\",\"nama_penyakit\":\"Polyuria\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R42\",\"nama_penyakit\":\"Vertigo\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R50\",\"nama_penyakit\":\"Demam yang tidak diketahui sebabnya\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R51\",\"nama_penyakit\":\"Headache\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"R52.9\",\"nama_penyakit\":\"Pain, unspecified\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R53\",\"nama_penyakit\":\"Lelah dan lesu\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R55\",\"nama_penyakit\":\"Syncope and collapse\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R56\",\"nama_penyakit\":\"Kejang demam\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R59\",\"nama_penyakit\":\"Pembesaran kelenjar getah bening\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R60\",\"nama_penyakit\":\"Oedema, not elsewhere classified\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R63.0\",\"nama_penyakit\":\"Anorexia\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"S00\",\"nama_penyakit\":\"Trauma kepala superfisial\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"S06\",\"nama_penyakit\":\"Trauma intrakranial misal : Comotio cerebri\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"S12\",\"nama_penyakit\":\"Fraktur leher\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"S13\",\"nama_penyakit\":\"Dislokasi sendi\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"S20\",\"nama_penyakit\":\"Trauma Thorax\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"S30\",\"nama_penyakit\":\"Trauma Abdomen\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"S42\",\"nama_penyakit\":\"Fraktur bahu dan lengan atas\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"S52\",\"nama_penyakit\":\"Fraktur lengan bawah\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"S62\",\"nama_penyakit\":\"Fraktur pergelangan tangan dan telapak tangan \"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"S72\",\"nama_penyakit\":\"Fraktur femur\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"S82\",\"nama_penyakit\":\"Fraktur tibia,Fibula,Achiles\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"S92\",\"nama_penyakit\":\"Fraktur telapak kaki\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"T14\",\"nama_penyakit\":\"Trauma tidak disebut bagian tubuh\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"T16\",\"nama_penyakit\":\"corpus alinum telinga\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"T20\",\"nama_penyakit\":\"Luka bakar\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"T43\",\"nama_penyakit\":\"Keracunan obat psikotropika yang tidak di klasifikasikan\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"T50\",\"nama_penyakit\":\"Keracunan obat, Medikamentosa bahan etiologi\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"T51\",\"nama_penyakit\":\"Keracunan alkohol\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"T52\",\"nama_penyakit\":\"Keracunan bahan organik\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"T60\",\"nama_penyakit\":\"Keracunan pestisida\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"T62\",\"nama_penyakit\":\"Keracunan makanan\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"T65\",\"nama_penyakit\":\"Keracunan bahan kimia\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"V89\",\"nama_penyakit\":\"Kecelakaan lalu lintas\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"W19\",\"nama_penyakit\":\"Jatuh\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"W25\",\"nama_penyakit\":\"Kontak dengan kaca\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"W26\",\"nama_penyakit\":\"Kontak dengan benda tajam\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"W74\",\"nama_penyakit\":\"Tenggelam\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"X29\",\"nama_penyakit\":\"Kontak dengan tanaman dan binatang beracun\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"X39\",\"nama_penyakit\":\"Bencana alam, Gunung Api, Gempa bumi, Longsor, Banjir, dll.\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"X84\",\"nama_penyakit\":\"Tindakan melukai diri sendiri termasuk bunuh diri\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"Y05\",\"nama_penyakit\":\"Perkosaan\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"Y07\",\"nama_penyakit\":\"Kecelakaan Kerja\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"Y07.9\",\"nama_penyakit\":\"Kekerasan lain  kekerasan dalam rumah tangga ( KDRT )\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z00.0\",\"nama_penyakit\":\"Pemeriksaan kesehatan\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z00.2\",\"nama_penyakit\":\"Pemeriksaan Tumbuh Kembang\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z01.0\",\"nama_penyakit\":\"Pemeriksaan Mata\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z01.1\",\"nama_penyakit\":\"Pemeriksaan Telinga\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z01.2\",\"nama_penyakit\":\"Pemeriksaan gigi\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z01.3\",\"nama_penyakit\":\"Pemeriksaan tekanan darah\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z01.4\",\"nama_penyakit\":\"Pemeriksaan Ginekologi termasuk Pap Smear\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z01.6\",\"nama_penyakit\":\"Pemeriksaan Radiologi\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z01.7\",\"nama_penyakit\":\"Pemeriksaan Laboratorium\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z1\",\"nama_penyakit\":\"Donor Darah\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z14.3\",\"nama_penyakit\":\"Tindakan\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z14.9\",\"nama_penyakit\":\"Jahit Luka\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z2\",\"nama_penyakit\":\"Oxygen\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"Z20.6\",\"nama_penyakit\":\"Kontak dengan HIV\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z23.2\",\"nama_penyakit\":\"BCG\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z23.5.1\",\"nama_penyakit\":\"TT1 Calon Pengantin\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z23.5.2\",\"nama_penyakit\":\"TT1 Ibu Hamil = T3\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z23.5.3\",\"nama_penyakit\":\"TT Anak Sekolah\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z23.56\",\"nama_penyakit\":\"DT Anak Sekolah\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z23.6\",\"nama_penyakit\":\"Diphteria\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z24.0\",\"nama_penyakit\":\"Polio\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z24.1\",\"nama_penyakit\":\"Viral Encephalitis (MENINGITIS HAJI)\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z24.4\",\"nama_penyakit\":\"Campak bayi\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z24.6\",\"nama_penyakit\":\"Viral Hepatitis\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z25.1\",\"nama_penyakit\":\"Influennza\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z27.1\",\"nama_penyakit\":\"DPT\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z3\",\"nama_penyakit\":\"Infus\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z30.0\",\"nama_penyakit\":\"Konseling KB\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z30.1\",\"nama_penyakit\":\"KB IUD\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z30.2\",\"nama_penyakit\":\"KB Lestari Tubektomi\\/Vasektomi\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z30.4\",\"nama_penyakit\":\"KB Hormonal\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z30.5\",\"nama_penyakit\":\"Kontrol  IUD\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z32\",\"nama_penyakit\":\"Tes Kehamilan\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z34\",\"nama_penyakit\":\"Pemeriksaan Kehamilan Normal\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z35\",\"nama_penyakit\":\"Resti Bumil\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z37\",\"nama_penyakit\":\"Bayi lahir\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z39\",\"nama_penyakit\":\"Perawatan Pospartum = masa nifas\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z4\",\"nama_penyakit\":\"Doppler\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z41.2\",\"nama_penyakit\":\"Sunat \\/ Sirkumsisi\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z48\",\"nama_penyakit\":\"Follow up tindakan operasi misal buka jahitan, buka pembalut dsb\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z5\",\"nama_penyakit\":\"Tindakan lain-2\"}]');
INSERT INTO `detail_laporan` (`id_laporan`, `id_jp`, `jenis_laporan`, `nama_puskesmas`, `status`, `tanggal`, `datalb1`) VALUES
(7, 2, 'Laporan Tribulan', 'Dinoyo', '0', '2020-05-22', '[{\"pasien\":[{\"Baru\":{\"Perempuan\":1,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":1,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}}],\"kode_dx\":\"1\",\"kode_icdx\":\"A00\",\"nama_penyakit\":\"Cholera\"},{\"pasien\":[{\"Baru\":{\"Perempuan\":1,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}}],\"kode_dx\":\"1\",\"kode_icdx\":\"A01.0\",\"nama_penyakit\":\"Typhoid Fever\"},{\"pasien\":[{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":1,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}}],\"kode_dx\":\"1\",\"kode_icdx\":\"A03\",\"nama_penyakit\":\"Syghelosis\"},{\"pasien\":[],\"kode_dx\":\"1\",\"kode_icdx\":\"A06\",\"nama_penyakit\":\"Amoebiasis\"},{\"pasien\":[{\"Baru\":{\"Perempuan\":0,\"Laki\":1},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}}],\"kode_dx\":\"1\",\"kode_icdx\":\"A09\",\"nama_penyakit\":\"Diare\"},{\"pasien\":[{\"Baru\":{\"Perempuan\":0,\"Laki\":1},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":1,\"Laki\":0}},{\"Baru\":{\"Perempuan\":1,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}}],\"kode_dx\":\"2\",\"kode_icdx\":\"A14\",\"nama_penyakit\":\"TB Relaps \\/ Kategori II\"},{\"pasien\":[{\"Baru\":{\"Perempuan\":0,\"Laki\":1},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}}],\"kode_dx\":\"2\",\"kode_icdx\":\"A15\",\"nama_penyakit\":\"TB Paru BTA (+)\"},{\"pasien\":[],\"kode_dx\":\"2\",\"kode_icdx\":\"A16\",\"nama_penyakit\":\"TB Klinis  Termasuk Rongent (+) BTA (-)  \"},{\"pasien\":[{\"Baru\":{\"Perempuan\":3,\"Laki\":7},\"Lama\":{\"Perempuan\":0,\"Laki\":1},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":1,\"Laki\":2},\"Lama\":{\"Perempuan\":0,\"Laki\":1},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":1},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":1},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":1,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}}],\"kode_dx\":\"2\",\"kode_icdx\":\"A18\",\"nama_penyakit\":\"TB Organ Lain\"},{\"pasien\":[],\"kode_dx\":\"3\",\"kode_icdx\":\"A30\",\"nama_penyakit\":\"Lepra\"},{\"pasien\":[],\"kode_dx\":\"3\",\"kode_icdx\":\"A31\",\"nama_penyakit\":\"Kusta PB\"},{\"pasien\":[],\"kode_dx\":\"3\",\"kode_icdx\":\"A32\",\"nama_penyakit\":\"Kusta MB\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"A33\",\"nama_penyakit\":\"Tetanus Neonatorum\"},{\"pasien\":[],\"kode_dx\":\"3\",\"kode_icdx\":\"A35\",\"nama_penyakit\":\"Tetanus Lainnya\"},{\"pasien\":[],\"kode_dx\":\"3\",\"kode_icdx\":\"A36\",\"nama_penyakit\":\"Diphtheria\"},{\"pasien\":[],\"kode_dx\":\"3\",\"kode_icdx\":\"A37\",\"nama_penyakit\":\"Batuk Rejan\"},{\"pasien\":[],\"kode_dx\":\"6\",\"kode_icdx\":\"A51\",\"nama_penyakit\":\"Early syphilis\"},{\"pasien\":[],\"kode_dx\":\"6\",\"kode_icdx\":\"A52\",\"nama_penyakit\":\"Late syphilis\"},{\"pasien\":[],\"kode_dx\":\"6\",\"kode_icdx\":\"A53\",\"nama_penyakit\":\"Sipilis\"},{\"pasien\":[],\"kode_dx\":\"6\",\"kode_icdx\":\"A54\",\"nama_penyakit\":\"Infeksi Gonokok\"},{\"pasien\":[],\"kode_dx\":\"6\",\"kode_icdx\":\"A55\",\"nama_penyakit\":\"Chlamydial Lymphogranuloma venerum\"},{\"pasien\":[],\"kode_dx\":\"6\",\"kode_icdx\":\"A56\",\"nama_penyakit\":\"Non Gonokok\"},{\"pasien\":[],\"kode_dx\":\"6\",\"kode_icdx\":\"A59\",\"nama_penyakit\":\"TRICHOMONAS\"},{\"pasien\":[],\"kode_dx\":\"6\",\"kode_icdx\":\"A59.0\",\"nama_penyakit\":\"Urogenital trichomoniasis\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"A63.0\",\"nama_penyakit\":\"Condyloma accuminatum\"},{\"pasien\":[{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":1,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}}],\"kode_dx\":\"4\",\"kode_icdx\":\"A80\",\"nama_penyakit\":\"Acute Poliomyelitis\"},{\"pasien\":[],\"kode_dx\":\"4\",\"kode_icdx\":\"A90\",\"nama_penyakit\":\"Dengue  Fever\"},{\"pasien\":[],\"kode_dx\":\"4\",\"kode_icdx\":\"A91\",\"nama_penyakit\":\"Dengue Haemorrhagic fever\"},{\"pasien\":[],\"kode_dx\":\"4\",\"kode_icdx\":\"A92.0\",\"nama_penyakit\":\"Chikungunya virus diseasa\"},{\"pasien\":[{\"Baru\":{\"Perempuan\":1,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}}],\"kode_dx\":\"4\",\"kode_icdx\":\"B00\",\"nama_penyakit\":\"Herpes simplex\"},{\"pasien\":[],\"kode_dx\":\"4\",\"kode_icdx\":\"B01\",\"nama_penyakit\":\"Varicella \"},{\"pasien\":[],\"kode_dx\":\"4\",\"kode_icdx\":\"B02\",\"nama_penyakit\":\"Herpes Zoster\"},{\"pasien\":[],\"kode_dx\":\"4\",\"kode_icdx\":\"B05\",\"nama_penyakit\":\"Morbili.\"},{\"pasien\":[],\"kode_dx\":\"4\",\"kode_icdx\":\"B07\",\"nama_penyakit\":\"Verruca vulgaris\"},{\"pasien\":[],\"kode_dx\":\"4\",\"kode_icdx\":\"B15\",\"nama_penyakit\":\"Acute Hepatitis A \"},{\"pasien\":[],\"kode_dx\":\"4\",\"kode_icdx\":\"B16\",\"nama_penyakit\":\"Acute hepatitis B \"},{\"pasien\":[],\"kode_dx\":\"4\",\"kode_icdx\":\"B17\",\"nama_penyakit\":\"Other Acute hepatitis\"},{\"pasien\":[{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":1,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}}],\"kode_dx\":\"4\",\"kode_icdx\":\"B18\",\"nama_penyakit\":\"Chronic viral hepatitis\"},{\"pasien\":[{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":1,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}}],\"kode_dx\":\"4\",\"kode_icdx\":\"B24\",\"nama_penyakit\":\"Unspecific HIV\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"B25\",\"nama_penyakit\":\"Cytomegaloviral pneumonitis\"},{\"pasien\":[],\"kode_dx\":\"4\",\"kode_icdx\":\"B26\",\"nama_penyakit\":\"Mumps\"},{\"pasien\":[],\"kode_dx\":\"7\",\"kode_icdx\":\"B35\",\"nama_penyakit\":\"Penyakit kulit karena jamur\"},{\"pasien\":[{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":1,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}}],\"kode_dx\":\"7\",\"kode_icdx\":\"B36.0\",\"nama_penyakit\":\"Pityriasis versicolour\"},{\"pasien\":[],\"kode_dx\":\"7\",\"kode_icdx\":\"B37.0\",\"nama_penyakit\":\"Candidal stomatitis\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"B40.0\",\"nama_penyakit\":\"Acute pulmonary blastomycosis\"},{\"pasien\":[],\"kode_dx\":\"5\",\"kode_icdx\":\"B50\",\"nama_penyakit\":\"Malaria Tropika (P Falciparum)\"},{\"pasien\":[],\"kode_dx\":\"5\",\"kode_icdx\":\"B51\",\"nama_penyakit\":\"Malaria Tertiana (P Vivax)\"},{\"pasien\":[],\"kode_dx\":\"5\",\"kode_icdx\":\"B54\",\"nama_penyakit\":\"Unspecified malaria. Clinically diagnosed malaria without\"},{\"pasien\":[],\"kode_dx\":\"5\",\"kode_icdx\":\"B55\",\"nama_penyakit\":\"parasitological confirmation.\"},{\"pasien\":[{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":1},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}},{\"Baru\":{\"Perempuan\":0,\"Laki\":0},\"Lama\":{\"Perempuan\":0,\"Laki\":0},\"KKL\":{\"Perempuan\":0,\"Laki\":0}}],\"kode_dx\":\"5\",\"kode_icdx\":\"B58\",\"nama_penyakit\":\"Toxoplasmosis\"},{\"pasien\":[],\"kode_dx\":\"7\",\"kode_icdx\":\"B74\",\"nama_penyakit\":\"Filariasis\"},{\"pasien\":[],\"kode_dx\":\"7\",\"kode_icdx\":\"B82.0\",\"nama_penyakit\":\"Intestinal helminthiasis\"},{\"pasien\":[],\"kode_dx\":\"7\",\"kode_icdx\":\"B86\",\"nama_penyakit\":\"Scabies.\"},{\"pasien\":[],\"kode_dx\":\"7\",\"kode_icdx\":\"B90\",\"nama_penyakit\":\"Gejala sisa dari TBC\"},{\"pasien\":[],\"kode_dx\":\"7\",\"kode_icdx\":\"B91\",\"nama_penyakit\":\"Gejala sisa dari poliomyelitis.\"},{\"pasien\":[],\"kode_dx\":\"7\",\"kode_icdx\":\"B92\",\"nama_penyakit\":\"Gejala sisa dari Kusta \\/ Lepra\"},{\"pasien\":[],\"kode_dx\":\"21\",\"kode_icdx\":\"C11\",\"nama_penyakit\":\"Tumor ganas : Nasopharynx\"},{\"pasien\":[],\"kode_dx\":\"21\",\"kode_icdx\":\"C18\",\"nama_penyakit\":\"Tumor Ganas : Usus Besar\"},{\"pasien\":[],\"kode_dx\":\"21\",\"kode_icdx\":\"C22\",\"nama_penyakit\":\"Ca Hepar\"},{\"pasien\":[],\"kode_dx\":\"21\",\"kode_icdx\":\"C34\",\"nama_penyakit\":\"Ca Paru-2\"},{\"pasien\":[],\"kode_dx\":\"21\",\"kode_icdx\":\"C50\",\"nama_penyakit\":\"Tumor ganas : Payudara\"},{\"pasien\":[],\"kode_dx\":\"21\",\"kode_icdx\":\"C53\",\"nama_penyakit\":\"Tumor ganas : Cervix\"},{\"pasien\":[],\"kode_dx\":\"21\",\"kode_icdx\":\"C61\",\"nama_penyakit\":\"Tumor ganas : Prostate\"},{\"pasien\":[],\"kode_dx\":\"21\",\"kode_icdx\":\"C76\",\"nama_penyakit\":\"Tumor ganas lain2\"},{\"pasien\":[],\"kode_dx\":\"21\",\"kode_icdx\":\"C95\",\"nama_penyakit\":\"Tumor ganas darah: Leukemia, Thalasemia\"},{\"pasien\":[],\"kode_dx\":\"21\",\"kode_icdx\":\"D17\",\"nama_penyakit\":\"Tumor jinak : Lipoma\"},{\"pasien\":[],\"kode_dx\":\"21\",\"kode_icdx\":\"D18\",\"nama_penyakit\":\"Tumor jinak : Hemangioma, Lymphangioma\"},{\"pasien\":[],\"kode_dx\":\"21\",\"kode_icdx\":\"D22\",\"nama_penyakit\":\"Tumor jinak : Melanocyclic Naevy\"},{\"pasien\":[],\"kode_dx\":\"21\",\"kode_icdx\":\"D24\",\"nama_penyakit\":\"Tumor jinak : Payudara\"},{\"pasien\":[],\"kode_dx\":\"21\",\"kode_icdx\":\"D25\",\"nama_penyakit\":\"Tumor jinak : Myoma\"},{\"pasien\":[],\"kode_dx\":\"21\",\"kode_icdx\":\"D27\",\"nama_penyakit\":\"Tumor jinak : Ovarium\"},{\"pasien\":[],\"kode_dx\":\"21\",\"kode_icdx\":\"D36\",\"nama_penyakit\":\"Tumor jinak : lain-2\"},{\"pasien\":[],\"kode_dx\":\"9\",\"kode_icdx\":\"D50\",\"nama_penyakit\":\"Anemia: Deff Fe\"},{\"pasien\":[],\"kode_dx\":\"9\",\"kode_icdx\":\"D51\",\"nama_penyakit\":\"Anemia :Deff B12\"},{\"pasien\":[],\"kode_dx\":\"9\",\"kode_icdx\":\"D52\",\"nama_penyakit\":\"Anemia: Asam Folat\"},{\"pasien\":[],\"kode_dx\":\"9\",\"kode_icdx\":\"D53\",\"nama_penyakit\":\"Anemia lain\"},{\"pasien\":[],\"kode_dx\":\"8\",\"kode_icdx\":\"E01\",\"nama_penyakit\":\"GAKI: Gondok Endemik: STRUMA\"},{\"pasien\":[],\"kode_dx\":\"8\",\"kode_icdx\":\"E05\",\"nama_penyakit\":\"Hipertiroidisme\"},{\"pasien\":[],\"kode_dx\":\"8\",\"kode_icdx\":\"E10\",\"nama_penyakit\":\"Type 1: Insulin dependen DM\"},{\"pasien\":[],\"kode_dx\":\"8\",\"kode_icdx\":\"E11\",\"nama_penyakit\":\"Type 2: Non insulin dependen DM\"},{\"pasien\":[],\"kode_dx\":\"9\",\"kode_icdx\":\"E16.2\",\"nama_penyakit\":\"Hypoglycaemia\"},{\"pasien\":[],\"kode_dx\":\"9\",\"kode_icdx\":\"E40\",\"nama_penyakit\":\"Kwashiorkor\"},{\"pasien\":[],\"kode_dx\":\"9\",\"kode_icdx\":\"E41\",\"nama_penyakit\":\"Nutritional marasmus\"},{\"pasien\":[],\"kode_dx\":\"9\",\"kode_icdx\":\"E42\",\"nama_penyakit\":\"Marasmic kwashiorkor\"},{\"pasien\":[],\"kode_dx\":\"12\",\"kode_icdx\":\"E50.7\",\"nama_penyakit\":\"Xerophtalmia\"},{\"pasien\":[],\"kode_dx\":\"9\",\"kode_icdx\":\"E66\",\"nama_penyakit\":\"Obesity\"},{\"pasien\":[],\"kode_dx\":\"9\",\"kode_icdx\":\"E78.0\",\"nama_penyakit\":\"Pure hypercholesterolaemia\"},{\"pasien\":[],\"kode_dx\":\"9\",\"kode_icdx\":\"E78.5\",\"nama_penyakit\":\"Hyperlipidaemia\"},{\"pasien\":[],\"kode_dx\":\"9\",\"kode_icdx\":\"E79\",\"nama_penyakit\":\"Gangguan Metabolisme purin pyrimidin\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F03\",\"nama_penyakit\":\"Dimensia unspecified\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F05\",\"nama_penyakit\":\"Delirium\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F10\",\"nama_penyakit\":\"Penyalahgunaan Alkohol\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F17\",\"nama_penyakit\":\"Penyalahgunaan tembakau\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F19\",\"nama_penyakit\":\"Penyalahgunaan Narkoba\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F20\",\"nama_penyakit\":\"Schizophrenia\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F29\",\"nama_penyakit\":\"Gangguan psikotik\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F31\",\"nama_penyakit\":\"Gangguan Bipolar\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F32\",\"nama_penyakit\":\"Gangguan Depresif\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F40\",\"nama_penyakit\":\"Gangguan Fobik\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F41\",\"nama_penyakit\":\"Gangguan Panik\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F41.1\",\"nama_penyakit\":\"Gangguan Anxietas\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F41.2\",\"nama_penyakit\":\"Gangguan Campuran Anxietas & Depresif \"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F42\",\"nama_penyakit\":\"Gangguan Obsesif Kompulsif\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F43.2\",\"nama_penyakit\":\"Gangguan Penyesuaian\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F45\",\"nama_penyakit\":\"Gangguan Somatoform\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F48\",\"nama_penyakit\":\"Gangguan Neurotik\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F50.0\",\"nama_penyakit\":\"Anoreksia nervosa\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"F51.0\",\"nama_penyakit\":\"INSOMNIA Non Organik\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F52\",\"nama_penyakit\":\"Gangguan Seksual pada Pria dan Wanita\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F53\",\"nama_penyakit\":\"Ganguan Jiwa & Perilaku yang berhubungan dengan Masa Nifas\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F69\",\"nama_penyakit\":\"Gangguan kepribadian\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F79\",\"nama_penyakit\":\"Retardasi Mental\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F84\",\"nama_penyakit\":\"Gangguan Perkembangan Pervasif\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F90\",\"nama_penyakit\":\"Gangguan Hiperkinetik\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F91\",\"nama_penyakit\":\"Gangguan Tingkah Laku\"},{\"pasien\":[],\"kode_dx\":\"10\",\"kode_icdx\":\"F98\",\"nama_penyakit\":\"Gangguan jiwa bermula pada bayi, anak\\/remaja\"},{\"pasien\":[],\"kode_dx\":\"11\",\"kode_icdx\":\"G03.9\",\"nama_penyakit\":\"Meningitis,  \"},{\"pasien\":[],\"kode_dx\":\"11\",\"kode_icdx\":\"G04.9\",\"nama_penyakit\":\"Encephalitis, \"},{\"pasien\":[],\"kode_dx\":\"11\",\"kode_icdx\":\"G20\",\"nama_penyakit\":\"Parkinson\'s\"},{\"pasien\":[],\"kode_dx\":\"11\",\"kode_icdx\":\"G30\",\"nama_penyakit\":\"Alzheimer\"},{\"pasien\":[],\"kode_dx\":\"11\",\"kode_icdx\":\"G35\",\"nama_penyakit\":\"Multiple sklerosis\"},{\"pasien\":[],\"kode_dx\":\"11\",\"kode_icdx\":\"G40\",\"nama_penyakit\":\"Epilepsi\"},{\"pasien\":[],\"kode_dx\":\"11\",\"kode_icdx\":\"G41\",\"nama_penyakit\":\"Status epilepticus\"},{\"pasien\":[],\"kode_dx\":\"11\",\"kode_icdx\":\"G43\",\"nama_penyakit\":\"Migraina\"},{\"pasien\":[],\"kode_dx\":\"11\",\"kode_icdx\":\"G44.2\",\"nama_penyakit\":\"Tension Headache\"},{\"pasien\":[],\"kode_dx\":\"11\",\"kode_icdx\":\"G47\",\"nama_penyakit\":\"Gangguan tidur\"},{\"pasien\":[],\"kode_dx\":\"11\",\"kode_icdx\":\"G51.0\",\"nama_penyakit\":\"Bell\'s Palsy\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"G54.2\",\"nama_penyakit\":\"CRS\"},{\"pasien\":[],\"kode_dx\":\"11\",\"kode_icdx\":\"G62\",\"nama_penyakit\":\"Polineuropathy\"},{\"pasien\":[],\"kode_dx\":\"11\",\"kode_icdx\":\"G80\",\"nama_penyakit\":\"Cerebral Palsy\"},{\"pasien\":[],\"kode_dx\":\"11\",\"kode_icdx\":\"G81\",\"nama_penyakit\":\"Hemiplegia\"},{\"pasien\":[],\"kode_dx\":\"11\",\"kode_icdx\":\"G82\",\"nama_penyakit\":\"Paraplegia dan Tetraplegia\"},{\"pasien\":[],\"kode_dx\":\"11\",\"kode_icdx\":\"G89\",\"nama_penyakit\":\"Acute Flaccid Paralysis (LUMPUH LAYU AKUTA)\"},{\"pasien\":[],\"kode_dx\":\"11\",\"kode_icdx\":\"G91\",\"nama_penyakit\":\"Hydrocephalus\"},{\"pasien\":[],\"kode_dx\":\"12\",\"kode_icdx\":\"H00\",\"nama_penyakit\":\"Hordeolum (Bintilan)\"},{\"pasien\":[],\"kode_dx\":\"12\",\"kode_icdx\":\"H01\",\"nama_penyakit\":\"Peradangan Kelopak mata\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"H02\",\"nama_penyakit\":\"Other disorders of eyelid\"},{\"pasien\":[],\"kode_dx\":\"12\",\"kode_icdx\":\"H04\",\"nama_penyakit\":\"Kelainan pada sistem kelenjar air mata\"},{\"pasien\":[],\"kode_dx\":\"12\",\"kode_icdx\":\"H10\",\"nama_penyakit\":\"Conjunctivitis\"},{\"pasien\":[],\"kode_dx\":\"12\",\"kode_icdx\":\"H11\",\"nama_penyakit\":\"Pterigium\"},{\"pasien\":[],\"kode_dx\":\"12\",\"kode_icdx\":\"H16\",\"nama_penyakit\":\"Kerattitis\"},{\"pasien\":[],\"kode_dx\":\"12\",\"kode_icdx\":\"H18\",\"nama_penyakit\":\"Kekeruhan Kornea\"},{\"pasien\":[],\"kode_dx\":\"12\",\"kode_icdx\":\"H20\",\"nama_penyakit\":\"Iridociclitis\\/ Uveitis\"},{\"pasien\":[],\"kode_dx\":\"12\",\"kode_icdx\":\"H26\",\"nama_penyakit\":\"Katarak\"},{\"pasien\":[],\"kode_dx\":\"12\",\"kode_icdx\":\"H40\",\"nama_penyakit\":\"Glaukoma\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"H50.2\",\"nama_penyakit\":\"HIPERROPIA\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"H52\",\"nama_penyakit\":\"Disorders of refraction and accommodation\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"H52.1\",\"nama_penyakit\":\"MIOPIA\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"H52.2\",\"nama_penyakit\":\"ASTIGMASMUS\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"H52.4\",\"nama_penyakit\":\"PRESBIOPIA\"},{\"pasien\":[],\"kode_dx\":\"12\",\"kode_icdx\":\"H53.5\",\"nama_penyakit\":\"Buta Warna\"},{\"pasien\":[],\"kode_dx\":\"12\",\"kode_icdx\":\"H53.6\",\"nama_penyakit\":\"Night blindness\"},{\"pasien\":[],\"kode_dx\":\"12\",\"kode_icdx\":\"H54\",\"nama_penyakit\":\"Kebutaan & Penurunan tajam penglihatan\"},{\"pasien\":[],\"kode_dx\":\"13\",\"kode_icdx\":\"H60\",\"nama_penyakit\":\"Otitis Externa\"},{\"pasien\":[],\"kode_dx\":\"13\",\"kode_icdx\":\"H66\",\"nama_penyakit\":\"Otitis Media\"},{\"pasien\":[],\"kode_dx\":\"13\",\"kode_icdx\":\"H70\",\"nama_penyakit\":\"Mastoiditis\"},{\"pasien\":[],\"kode_dx\":\"13\",\"kode_icdx\":\"H73\",\"nama_penyakit\":\"Gangguan Membran timpani\"},{\"pasien\":[],\"kode_dx\":\"13\",\"kode_icdx\":\"H83.3\",\"nama_penyakit\":\"Tuli Akibat Bising (Noise Induce Hearing  Loss)\"},{\"pasien\":[],\"kode_dx\":\"13\",\"kode_icdx\":\"H90\",\"nama_penyakit\":\"Tuli Kongenital\"},{\"pasien\":[],\"kode_dx\":\"13\",\"kode_icdx\":\"H91.1\",\"nama_penyakit\":\"Presbikusis\"},{\"pasien\":[],\"kode_dx\":\"13\",\"kode_icdx\":\"H93.1\",\"nama_penyakit\":\"Tinitus\"},{\"pasien\":[],\"kode_dx\":\"13\",\"kode_icdx\":\"H93.9\",\"nama_penyakit\":\"Gangguan telinga lain (Cerumen)\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"I 64\",\"nama_penyakit\":\"CVA\"},{\"pasien\":[],\"kode_dx\":\"14\",\"kode_icdx\":\"I09\",\"nama_penyakit\":\"Penyakit jantung rematik\"},{\"pasien\":[],\"kode_dx\":\"14\",\"kode_icdx\":\"I10\",\"nama_penyakit\":\"Hipertensi Primer\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"I11\",\"nama_penyakit\":\"HHD\"},{\"pasien\":[],\"kode_dx\":\"14\",\"kode_icdx\":\"I15\",\"nama_penyakit\":\"Hipertensi Sekunder\"},{\"pasien\":[],\"kode_dx\":\"14\",\"kode_icdx\":\"I20\",\"nama_penyakit\":\"Angina Pectoris\"},{\"pasien\":[],\"kode_dx\":\"14\",\"kode_icdx\":\"I21\",\"nama_penyakit\":\"Infark Miokard Akut\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"I21.9\",\"nama_penyakit\":\"Acut Myocardial infarction, unspecified\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"I25\",\"nama_penyakit\":\"CAD\"},{\"pasien\":[],\"kode_dx\":\"14\",\"kode_icdx\":\"I49\",\"nama_penyakit\":\"Gangguan irama Jantung\"},{\"pasien\":[],\"kode_dx\":\"14\",\"kode_icdx\":\"I50\",\"nama_penyakit\":\"Gagal Jantung\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"I63.9\",\"nama_penyakit\":\"Cerebral Infark\"},{\"pasien\":[],\"kode_dx\":\"15\",\"kode_icdx\":\"I80\",\"nama_penyakit\":\"Phlebitis\"},{\"pasien\":[],\"kode_dx\":\"15\",\"kode_icdx\":\"I83\",\"nama_penyakit\":\"Varises\"},{\"pasien\":[],\"kode_dx\":\"15\",\"kode_icdx\":\"I84\",\"nama_penyakit\":\"Wasir (Hemorrhoid)\"},{\"pasien\":[],\"kode_dx\":\"15\",\"kode_icdx\":\"I88\",\"nama_penyakit\":\"Lymphadenitis\"},{\"pasien\":[],\"kode_dx\":\"14\",\"kode_icdx\":\"I96\",\"nama_penyakit\":\"Hipotensi\"},{\"pasien\":[],\"kode_dx\":\"16\",\"kode_icdx\":\"J00\",\"nama_penyakit\":\"Infeksi Saluran Pernapasan Akut\"},{\"pasien\":[],\"kode_dx\":\"16\",\"kode_icdx\":\"J01\",\"nama_penyakit\":\"Sinusitis\"},{\"pasien\":[],\"kode_dx\":\"16\",\"kode_icdx\":\"J02\",\"nama_penyakit\":\"Pharingitis\"},{\"pasien\":[],\"kode_dx\":\"16\",\"kode_icdx\":\"J03\",\"nama_penyakit\":\"Tonsilitis\"},{\"pasien\":[],\"kode_dx\":\"16\",\"kode_icdx\":\"J04\",\"nama_penyakit\":\"Laringitis & tracheaitis\"},{\"pasien\":[],\"kode_dx\":\"16\",\"kode_icdx\":\"J11\",\"nama_penyakit\":\"Influenza, virus tidak diidentifikasi\"},{\"pasien\":[],\"kode_dx\":\"16\",\"kode_icdx\":\"J18\",\"nama_penyakit\":\"Pneumonia\"},{\"pasien\":[],\"kode_dx\":\"16\",\"kode_icdx\":\"J20\",\"nama_penyakit\":\"Bronkhitis Akuta\"},{\"pasien\":[],\"kode_dx\":\"16\",\"kode_icdx\":\"J21\",\"nama_penyakit\":\"Bronkhitis Khronika\"},{\"pasien\":[],\"kode_dx\":\"16\",\"kode_icdx\":\"J30.4\",\"nama_penyakit\":\"Rhinitis alergi\"},{\"pasien\":[],\"kode_dx\":\"16\",\"kode_icdx\":\"J33\",\"nama_penyakit\":\"Nasal polyp\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"J44\",\"nama_penyakit\":\"COPD\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"J44.9\",\"nama_penyakit\":\"COPD\"},{\"pasien\":[],\"kode_dx\":\"16\",\"kode_icdx\":\"J45\",\"nama_penyakit\":\"Asma\"},{\"pasien\":[],\"kode_dx\":\"16\",\"kode_icdx\":\"J46\",\"nama_penyakit\":\"Status Asmatikus\"},{\"pasien\":[],\"kode_dx\":\"16\",\"kode_icdx\":\"J90\",\"nama_penyakit\":\"Efusi pleura\"},{\"pasien\":[],\"kode_dx\":\"16\",\"kode_icdx\":\"J93\",\"nama_penyakit\":\"Pneumothorak\"},{\"pasien\":[],\"kode_dx\":\"16\",\"kode_icdx\":\"J94\",\"nama_penyakit\":\"Pleuritis\"},{\"pasien\":[],\"kode_dx\":\"18\",\"kode_icdx\":\"K.41.9\",\"nama_penyakit\":\"Hernia Femoral\"},{\"pasien\":[],\"kode_dx\":\"18\",\"kode_icdx\":\"K.46.9\",\"nama_penyakit\":\"Hernia\"},{\"pasien\":[],\"kode_dx\":\"17\",\"kode_icdx\":\"K00\",\"nama_penyakit\":\"PERSISTENSI\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"K01\",\"nama_penyakit\":\"IMPAKSI\"},{\"pasien\":[],\"kode_dx\":\"17\",\"kode_icdx\":\"K02\",\"nama_penyakit\":\"Carries Gigi\"},{\"pasien\":[],\"kode_dx\":\"17\",\"kode_icdx\":\"K03\",\"nama_penyakit\":\"Calculus dan Deposit lain\"},{\"pasien\":[],\"kode_dx\":\"17\",\"kode_icdx\":\"K04\",\"nama_penyakit\":\"Peny Pulpa & Jaringan Perapikal\"},{\"pasien\":[],\"kode_dx\":\"17\",\"kode_icdx\":\"K05\",\"nama_penyakit\":\"Peny Gusi & Jaringan Periodental\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"K06\",\"nama_penyakit\":\"Gangguan Gusi & Hubungan alveolar\"},{\"pasien\":[],\"kode_dx\":\"17\",\"kode_icdx\":\"K07\",\"nama_penyakit\":\"Kelainan Dento Fasial termasuk Mal Oklusi\"},{\"pasien\":[],\"kode_dx\":\"17\",\"kode_icdx\":\"K08\",\"nama_penyakit\":\"Gg gigi & struktur penyangga lain: strain, trauma\"},{\"pasien\":[],\"kode_dx\":\"17\",\"kode_icdx\":\"K12\",\"nama_penyakit\":\"Stomatitis termasuk pada bibir dan mukosa mulut\"},{\"pasien\":[],\"kode_dx\":\"18\",\"kode_icdx\":\"K25\",\"nama_penyakit\":\"Tukak lambung\"},{\"pasien\":[],\"kode_dx\":\"18\",\"kode_icdx\":\"K29\",\"nama_penyakit\":\"Gastritis\"},{\"pasien\":[],\"kode_dx\":\"18\",\"kode_icdx\":\"K30\",\"nama_penyakit\":\"Dyspepsia\"},{\"pasien\":[],\"kode_dx\":\"18\",\"kode_icdx\":\"K35\",\"nama_penyakit\":\"Apendicitis Akut\"},{\"pasien\":[],\"kode_dx\":\"18\",\"kode_icdx\":\"K74\",\"nama_penyakit\":\"Cirrhosis Hepatis\"},{\"pasien\":[],\"kode_dx\":\"18\",\"kode_icdx\":\"K81.0\",\"nama_penyakit\":\"Cholecystitis akut\"},{\"pasien\":[],\"kode_dx\":\"18\",\"kode_icdx\":\"K92.0\",\"nama_penyakit\":\"Haematemesis\"},{\"pasien\":[],\"kode_dx\":\"18\",\"kode_icdx\":\"K92.1\",\"nama_penyakit\":\"Melena\"},{\"pasien\":[],\"kode_dx\":\"0\",\"kode_icdx\":\"kode_icdx\",\"nama_penyakit\":\"nama_penyakit\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L01\",\"nama_penyakit\":\"Impetigo\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L02\",\"nama_penyakit\":\"Abses, Furuncle, Carbuncle\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L03\",\"nama_penyakit\":\"Cellulitis\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L04\",\"nama_penyakit\":\"Lymphadenitis Akuta\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L08\",\"nama_penyakit\":\"Pioderma\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"L10.0\",\"nama_penyakit\":\"Pemphigus vulgaris\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L20\",\"nama_penyakit\":\"Atopic Dermatitis\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L21\",\"nama_penyakit\":\"Seborrhoic Dermatitis\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L22\",\"nama_penyakit\":\"Diaper Dermatitis\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L23\",\"nama_penyakit\":\"Derrmatitis  Kontak Alergi\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L24\",\"nama_penyakit\":\"Dermatitis Kontak Irritan\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L28\",\"nama_penyakit\":\"Lichen Simplex Chronic\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L29\",\"nama_penyakit\":\"Pruritus\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L30.3\",\"nama_penyakit\":\"Infective Derrmatitis\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L40\",\"nama_penyakit\":\"Psoriasis\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L42\",\"nama_penyakit\":\"Pityriasis Rosea\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"L43\",\"nama_penyakit\":\"Lichen planus\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L50\",\"nama_penyakit\":\"Urticaria\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L60.0\",\"nama_penyakit\":\"Ingrowing Nail\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L70\",\"nama_penyakit\":\"Acne\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L74\",\"nama_penyakit\":\"Miliaria\"},{\"pasien\":[],\"kode_dx\":\"23\",\"kode_icdx\":\"L80\",\"nama_penyakit\":\"vitiligo\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"L84\",\"nama_penyakit\":\"Corns and callosities\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"L89\",\"nama_penyakit\":\"Pressure ulcer\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"M 79.1\",\"nama_penyakit\":\"Myalgia\"},{\"pasien\":[],\"kode_dx\":\"24\",\"kode_icdx\":\"M06\",\"nama_penyakit\":\"Rheumatoid Arthritis\"},{\"pasien\":[],\"kode_dx\":\"24\",\"kode_icdx\":\"M10\",\"nama_penyakit\":\"Gout\"},{\"pasien\":[],\"kode_dx\":\"24\",\"kode_icdx\":\"M19\",\"nama_penyakit\":\"Osteoarthritis\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"M25\",\"nama_penyakit\":\"Other joint disorder, not elsewhere classified\"},{\"pasien\":[],\"kode_dx\":\"24\",\"kode_icdx\":\"M32\",\"nama_penyakit\":\"SLE\"},{\"pasien\":[],\"kode_dx\":\"24\",\"kode_icdx\":\"M40\",\"nama_penyakit\":\"Kyphosis dan Lordosis\"},{\"pasien\":[],\"kode_dx\":\"24\",\"kode_icdx\":\"M41\",\"nama_penyakit\":\"Scoliosis\"},{\"pasien\":[],\"kode_dx\":\"24\",\"kode_icdx\":\"M51\",\"nama_penyakit\":\"HNP\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"M53.1\",\"nama_penyakit\":\"CRS\"},{\"pasien\":[],\"kode_dx\":\"24\",\"kode_icdx\":\"M54.5\",\"nama_penyakit\":\"LBP\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"M65.3\",\"nama_penyakit\":\"TRYER FINGER\"},{\"pasien\":[],\"kode_dx\":\"24\",\"kode_icdx\":\"M80\",\"nama_penyakit\":\"Osteoporosis dengan Fraktur\"},{\"pasien\":[],\"kode_dx\":\"24\",\"kode_icdx\":\"M81\",\"nama_penyakit\":\"Osteoporosis tanpa Fraktur\"},{\"pasien\":[],\"kode_dx\":\"24\",\"kode_icdx\":\"M86\",\"nama_penyakit\":\"Osteomyelitis\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"N 39.0\",\"nama_penyakit\":\"ISK\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N04\",\"nama_penyakit\":\"Nephrotic Syndrome\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N08\",\"nama_penyakit\":\"GNA\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N17\",\"nama_penyakit\":\"Gagal Ginjal Akut\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N18\",\"nama_penyakit\":\"Gagal Ginjal Khronika\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N20\",\"nama_penyakit\":\"Batu Ginjal dan Ureter\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N21\",\"nama_penyakit\":\"Batu Sal. Kemih bagian bawah\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N23\",\"nama_penyakit\":\"Unspesified Renal Kolik\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N30\",\"nama_penyakit\":\"Cystitis\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N34\",\"nama_penyakit\":\"Urethritis\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"N39\",\"nama_penyakit\":\"ISK\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N40\",\"nama_penyakit\":\"BPH\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N43\",\"nama_penyakit\":\"Hydrocele\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N45\",\"nama_penyakit\":\"Orchitis\\/ Epididimitis\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N47\",\"nama_penyakit\":\"Phymosis\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N60\",\"nama_penyakit\":\"Benign Mammary Displasia\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N61\",\"nama_penyakit\":\"Mastitis \\/ Abscess\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N62\",\"nama_penyakit\":\"Gynaecomastia\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N73\",\"nama_penyakit\":\"Peradangan Pinggul (PID ) tidak spesifik\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N75\",\"nama_penyakit\":\"Diseases of Bartholin\'s Gland\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N76\",\"nama_penyakit\":\"Peradangan Vagena dan Vulva\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"N83\",\"nama_penyakit\":\"KISTA\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N87\",\"nama_penyakit\":\"Carcinoma Cervix\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N89.8\",\"nama_penyakit\":\"Fluor Vaginalis\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N91\",\"nama_penyakit\":\"Amenorrhoe \\/ Oligomenorrhea\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N92\",\"nama_penyakit\":\"Meno\\/metrorhagia\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N93.0\",\"nama_penyakit\":\"Post Coital Bleeding\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N94\",\"nama_penyakit\":\"Dysmenorrhoe\"},{\"pasien\":[],\"kode_dx\":\"19\",\"kode_icdx\":\"N95\",\"nama_penyakit\":\"Menopause dan gejala ikutan lain\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O00\",\"nama_penyakit\":\"Kehamilan Ektopik\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O01\",\"nama_penyakit\":\"Mola Hidatidosa\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O02.0\",\"nama_penyakit\":\"Blighted ovum\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O03\",\"nama_penyakit\":\"Abortus Spontan\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O11\",\"nama_penyakit\":\"Superimposed pre-eclampsia\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O13\",\"nama_penyakit\":\"Pre-eclampsia ringan\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O14.0\",\"nama_penyakit\":\"Pre-eclampsia sedang\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O14.1\",\"nama_penyakit\":\"Pre-eclampsia berat\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O15\",\"nama_penyakit\":\"Eclampsia\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O20\",\"nama_penyakit\":\"Hemorrhage in early pregnancy\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O21\",\"nama_penyakit\":\"Hyperemesis Gravidarum\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O22\",\"nama_penyakit\":\"Gangguan Vena pada kehamilan\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O23\",\"nama_penyakit\":\"Infeksi Saluran Kencing Pada Kehamilan\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O24\",\"nama_penyakit\":\"Pregnancy & DM\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O25\",\"nama_penyakit\":\"Malnutrisi pada kehamilan\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O30\",\"nama_penyakit\":\"Multiple Gestation\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O40\",\"nama_penyakit\":\"Polyhidramnion\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O41\",\"nama_penyakit\":\"Oligohydramnion\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O42\",\"nama_penyakit\":\"PRM\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O44\",\"nama_penyakit\":\"Placenta Pravia\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O45\",\"nama_penyakit\":\"Solutio Placenta\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O46\",\"nama_penyakit\":\"Antepartum Bleeding \"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O48\",\"nama_penyakit\":\"Post Date\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O60\",\"nama_penyakit\":\"Preterm Delivery\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O61\",\"nama_penyakit\":\"Rintangan Persalinan : Induksi gagal\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O63\",\"nama_penyakit\":\"Rintangan Persalinan : Partus lama\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O64\",\"nama_penyakit\":\"Rintangan Persalinan : Malposisi\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O65\",\"nama_penyakit\":\"Rintangan Persalinan : abnormal pelvic\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O70\",\"nama_penyakit\":\"Perineal laseration\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O72\",\"nama_penyakit\":\"Pendarahan Pastportum\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O73\",\"nama_penyakit\":\"Retentio Placenta\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O80.0\",\"nama_penyakit\":\"Spontan Delivery (vertex)\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O81\",\"nama_penyakit\":\"Delivery  Forcep \\/ Vacuum\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O82\",\"nama_penyakit\":\"SCTP\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"O84\",\"nama_penyakit\":\"Multiple Delivery\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P01.5\",\"nama_penyakit\":\"Bayi lahir kembar dua atau lebih\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P01.7\",\"nama_penyakit\":\"Bayi lahir dengan malpresentasi\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P02\",\"nama_penyakit\":\"Bayi lahir dengan gangguan plasenta, tali pusat dan membran\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P03.4\",\"nama_penyakit\":\"Bayi Lahir dengan SC\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P03.6\",\"nama_penyakit\":\"Bayi lahir dengan gangguan kontraksi uteri\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P05\",\"nama_penyakit\":\"Taksiran berat janin tidak sesuai dengan usia kehamilan\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P07.1\",\"nama_penyakit\":\"BBLR\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P07.2\",\"nama_penyakit\":\"Imaturitas < 28 minggu\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P07.3 \",\"nama_penyakit\":\"Preterm: UK 25-37 minggu\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P08.0\",\"nama_penyakit\":\"Berat badan lahir > 4500 gram\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P08.2\",\"nama_penyakit\":\"Bayi lahir post date\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P20\",\"nama_penyakit\":\"Intrauterine Hypoxia\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P21\",\"nama_penyakit\":\"Birth asphyxia\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P22\",\"nama_penyakit\":\"Respiratory distres of newborn\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P24\",\"nama_penyakit\":\"Neonatal aspiration syndromes\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P59.9\",\"nama_penyakit\":\"Neonatal Jaundice, unspesified\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P80\",\"nama_penyakit\":\"Hipothermia of newborn\"},{\"pasien\":[],\"kode_dx\":\"25\",\"kode_icdx\":\"P95 \",\"nama_penyakit\":\"Kematian fetus tidak jelas : lahir mati & IUFD\"},{\"pasien\":[],\"kode_dx\":\"26\",\"kode_icdx\":\"Q03\",\"nama_penyakit\":\"Congenital hydrocephalus\"},{\"pasien\":[],\"kode_dx\":\"26\",\"kode_icdx\":\"Q21\",\"nama_penyakit\":\"Kelainan Jantung Bawaan\"},{\"pasien\":[],\"kode_dx\":\"26\",\"kode_icdx\":\"Q35\",\"nama_penyakit\":\"Cleft palate: palatum sumbing\"},{\"pasien\":[],\"kode_dx\":\"26\",\"kode_icdx\":\"Q36\",\"nama_penyakit\":\"Cleft lip: bibir sumbing\"},{\"pasien\":[],\"kode_dx\":\"26\",\"kode_icdx\":\"Q37\",\"nama_penyakit\":\"bibir dan palatum sumbing\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R00\",\"nama_penyakit\":\"Kelainan irama jantung\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"R02\",\"nama_penyakit\":\"Gangrene, not elsewhere classified\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R04.0\",\"nama_penyakit\":\"Epistaxis\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R04.2\",\"nama_penyakit\":\"Batuk Darah\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R05\",\"nama_penyakit\":\"Batuk\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R06.0\",\"nama_penyakit\":\"Dyspnoe\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R06.2\",\"nama_penyakit\":\"Wheezing\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R06.6\",\"nama_penyakit\":\"Hiccouhg \\/ cegukan\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R07.4\",\"nama_penyakit\":\"Chest pain, unspeccified\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R09.0\",\"nama_penyakit\":\"Asphyxia\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R10.0\",\"nama_penyakit\":\"Abdominal pain\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R11\",\"nama_penyakit\":\"Nause and Vomiting\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R12\",\"nama_penyakit\":\"Pain\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R14\",\"nama_penyakit\":\"Kembung\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R15\",\"nama_penyakit\":\"Obstipasi\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R16\",\"nama_penyakit\":\"Hepatomegaly and splenomegaly, not elsewhere clasified\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R18\",\"nama_penyakit\":\"Ascites\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R25.2\",\"nama_penyakit\":\"Kram dan kejang\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R33\",\"nama_penyakit\":\"Retention of urine\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R34\",\"nama_penyakit\":\"Anuria dan oliguria\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R35\",\"nama_penyakit\":\"Polyuria\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R42\",\"nama_penyakit\":\"Vertigo\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R50\",\"nama_penyakit\":\"Demam yang tidak diketahui sebabnya\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R51\",\"nama_penyakit\":\"Headache\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"R52.9\",\"nama_penyakit\":\"Pain, unspecified\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R53\",\"nama_penyakit\":\"Lelah dan lesu\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R55\",\"nama_penyakit\":\"Syncope and collapse\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R56\",\"nama_penyakit\":\"Kejang demam\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R59\",\"nama_penyakit\":\"Pembesaran kelenjar getah bening\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R60\",\"nama_penyakit\":\"Oedema, not elsewhere classified\"},{\"pasien\":[],\"kode_dx\":\"27\",\"kode_icdx\":\"R63.0\",\"nama_penyakit\":\"Anorexia\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"S00\",\"nama_penyakit\":\"Trauma kepala superfisial\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"S06\",\"nama_penyakit\":\"Trauma intrakranial misal : Comotio cerebri\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"S12\",\"nama_penyakit\":\"Fraktur leher\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"S13\",\"nama_penyakit\":\"Dislokasi sendi\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"S20\",\"nama_penyakit\":\"Trauma Thorax\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"S30\",\"nama_penyakit\":\"Trauma Abdomen\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"S42\",\"nama_penyakit\":\"Fraktur bahu dan lengan atas\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"S52\",\"nama_penyakit\":\"Fraktur lengan bawah\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"S62\",\"nama_penyakit\":\"Fraktur pergelangan tangan dan telapak tangan \"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"S72\",\"nama_penyakit\":\"Fraktur femur\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"S82\",\"nama_penyakit\":\"Fraktur tibia,Fibula,Achiles\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"S92\",\"nama_penyakit\":\"Fraktur telapak kaki\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"T14\",\"nama_penyakit\":\"Trauma tidak disebut bagian tubuh\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"T16\",\"nama_penyakit\":\"corpus alinum telinga\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"T20\",\"nama_penyakit\":\"Luka bakar\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"T43\",\"nama_penyakit\":\"Keracunan obat psikotropika yang tidak di klasifikasikan\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"T50\",\"nama_penyakit\":\"Keracunan obat, Medikamentosa bahan etiologi\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"T51\",\"nama_penyakit\":\"Keracunan alkohol\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"T52\",\"nama_penyakit\":\"Keracunan bahan organik\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"T60\",\"nama_penyakit\":\"Keracunan pestisida\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"T62\",\"nama_penyakit\":\"Keracunan makanan\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"T65\",\"nama_penyakit\":\"Keracunan bahan kimia\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"V89\",\"nama_penyakit\":\"Kecelakaan lalu lintas\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"W19\",\"nama_penyakit\":\"Jatuh\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"W25\",\"nama_penyakit\":\"Kontak dengan kaca\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"W26\",\"nama_penyakit\":\"Kontak dengan benda tajam\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"W74\",\"nama_penyakit\":\"Tenggelam\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"X29\",\"nama_penyakit\":\"Kontak dengan tanaman dan binatang beracun\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"X39\",\"nama_penyakit\":\"Bencana alam, Gunung Api, Gempa bumi, Longsor, Banjir, dll.\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"X84\",\"nama_penyakit\":\"Tindakan melukai diri sendiri termasuk bunuh diri\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"Y05\",\"nama_penyakit\":\"Perkosaan\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"Y07\",\"nama_penyakit\":\"Kecelakaan Kerja\"},{\"pasien\":[],\"kode_dx\":\"22\",\"kode_icdx\":\"Y07.9\",\"nama_penyakit\":\"Kekerasan lain  kekerasan dalam rumah tangga ( KDRT )\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z00.0\",\"nama_penyakit\":\"Pemeriksaan kesehatan\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z00.2\",\"nama_penyakit\":\"Pemeriksaan Tumbuh Kembang\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z01.0\",\"nama_penyakit\":\"Pemeriksaan Mata\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z01.1\",\"nama_penyakit\":\"Pemeriksaan Telinga\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z01.2\",\"nama_penyakit\":\"Pemeriksaan gigi\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z01.3\",\"nama_penyakit\":\"Pemeriksaan tekanan darah\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z01.4\",\"nama_penyakit\":\"Pemeriksaan Ginekologi termasuk Pap Smear\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z01.6\",\"nama_penyakit\":\"Pemeriksaan Radiologi\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z01.7\",\"nama_penyakit\":\"Pemeriksaan Laboratorium\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z1\",\"nama_penyakit\":\"Donor Darah\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z14.3\",\"nama_penyakit\":\"Tindakan\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z14.9\",\"nama_penyakit\":\"Jahit Luka\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z2\",\"nama_penyakit\":\"Oxygen\"},{\"pasien\":[],\"kode_dx\":\"29\",\"kode_icdx\":\"Z20.6\",\"nama_penyakit\":\"Kontak dengan HIV\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z23.2\",\"nama_penyakit\":\"BCG\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z23.5.1\",\"nama_penyakit\":\"TT1 Calon Pengantin\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z23.5.2\",\"nama_penyakit\":\"TT1 Ibu Hamil = T3\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z23.5.3\",\"nama_penyakit\":\"TT Anak Sekolah\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z23.56\",\"nama_penyakit\":\"DT Anak Sekolah\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z23.6\",\"nama_penyakit\":\"Diphteria\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z24.0\",\"nama_penyakit\":\"Polio\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z24.1\",\"nama_penyakit\":\"Viral Encephalitis (MENINGITIS HAJI)\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z24.4\",\"nama_penyakit\":\"Campak bayi\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z24.6\",\"nama_penyakit\":\"Viral Hepatitis\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z25.1\",\"nama_penyakit\":\"Influennza\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z27.1\",\"nama_penyakit\":\"DPT\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z3\",\"nama_penyakit\":\"Infus\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z30.0\",\"nama_penyakit\":\"Konseling KB\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z30.1\",\"nama_penyakit\":\"KB IUD\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z30.2\",\"nama_penyakit\":\"KB Lestari Tubektomi\\/Vasektomi\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z30.4\",\"nama_penyakit\":\"KB Hormonal\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z30.5\",\"nama_penyakit\":\"Kontrol  IUD\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z32\",\"nama_penyakit\":\"Tes Kehamilan\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z34\",\"nama_penyakit\":\"Pemeriksaan Kehamilan Normal\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z35\",\"nama_penyakit\":\"Resti Bumil\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z37\",\"nama_penyakit\":\"Bayi lahir\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z39\",\"nama_penyakit\":\"Perawatan Pospartum = masa nifas\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z4\",\"nama_penyakit\":\"Doppler\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z41.2\",\"nama_penyakit\":\"Sunat \\/ Sirkumsisi\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z48\",\"nama_penyakit\":\"Follow up tindakan operasi misal buka jahitan, buka pembalut dsb\"},{\"pasien\":[],\"kode_dx\":\"28\",\"kode_icdx\":\"Z5\",\"nama_penyakit\":\"Tindakan lain-2\"}]');
INSERT INTO `detail_laporan` (`id_laporan`, `id_jp`, `jenis_laporan`, `nama_puskesmas`, `status`, `tanggal`, `datalb1`) VALUES
(15, 4, 'Laporan 15 Penyakit Terbanyak Bulanan', 'Dinoyo', '1', '2020-05-28', '[{\"pasien\":[],\"kode_dx\":\"1\",\"kode_icdx\":\"A00\",\"nama_penyakit\":\"Cholera\"},{\"pasien\":[{\"Perempuan\":1,\"Laki\":0}],\"kode_dx\":\"1\",\"kode_icdx\":\"A01.0\",\"nama_penyakit\":\"Typhoid Fever\"},{\"pasien\":[],\"kode_dx\":\"1\",\"kode_icdx\":\"A03\",\"nama_penyakit\":\"Syghelosis\"},{\"pasien\":[],\"kode_dx\":\"1\",\"kode_icdx\":\"A06\",\"nama_penyakit\":\"Amoebiasis\"},{\"pasien\":[{\"Perempuan\":0,\"Laki\":1}],\"kode_dx\":\"1\",\"kode_icdx\":\"A09\",\"nama_penyakit\":\"Diare\"},{\"pasien\":[{\"Perempuan\":2,\"Laki\":1}],\"kode_dx\":\"2\",\"kode_icdx\":\"A14\",\"nama_penyakit\":\"TB Relaps \\/ Kategori II\"},{\"pasien\":[{\"Perempuan\":0,\"Laki\":1}],\"kode_dx\":\"2\",\"kode_icdx\":\"A15\",\"nama_penyakit\":\"TB Paru BTA (+)\"},{\"pasien\":[],\"kode_dx\":\"2\",\"kode_icdx\":\"A16\",\"nama_penyakit\":\"TB Klinis  Termasuk Rongent (+) BTA (-)  \"},{\"pasien\":[{\"Perempuan\":5,\"Laki\":13}],\"kode_dx\":\"2\",\"kode_icdx\":\"A18\",\"nama_penyakit\":\"TB Organ Lain\"},{\"pasien\":[],\"kode_dx\":\"3\",\"kode_icdx\":\"A30\",\"nama_penyakit\":\"Lepra\"},{\"pasien\":[],\"kode_dx\":\"3\",\"kode_icdx\":\"A31\",\"nama_penyakit\":\"Kusta PB\"},{\"pasien\":[],\"kode_dx\":\"3\",\"kode_icdx\":\"A32\",\"nama_penyakit\":\"Kusta MB\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"A33\",\"nama_penyakit\":\"Tetanus Neonatorum\"},{\"pasien\":[],\"kode_dx\":\"3\",\"kode_icdx\":\"A35\",\"nama_penyakit\":\"Tetanus Lainnya\"},{\"pasien\":[],\"kode_dx\":\"3\",\"kode_icdx\":\"A36\",\"nama_penyakit\":\"Diphtheria\"}]'),
(23, 6, 'Laporan 15 Penyakit Terbanyak Tahunan', 'Dinoyo', '1', '2020-05-28', '[{\"pasien\":[{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":2,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0}],\"kode_dx\":\"1\",\"kode_icdx\":\"A00\",\"nama_penyakit\":\"Cholera\"},{\"pasien\":[{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":1,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0}],\"kode_dx\":\"1\",\"kode_icdx\":\"A01.0\",\"nama_penyakit\":\"Typhoid Fever\"},{\"pasien\":[{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":1,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0}],\"kode_dx\":\"1\",\"kode_icdx\":\"A03\",\"nama_penyakit\":\"Syghelosis\"},{\"pasien\":[{\"Perempuan\":0,\"Laki\":1},{\"Perempuan\":0,\"Laki\":1},{\"Perempuan\":0,\"Laki\":2},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0}],\"kode_dx\":\"1\",\"kode_icdx\":\"A06\",\"nama_penyakit\":\"Amoebiasis\"},{\"pasien\":[{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":1},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":1},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0}],\"kode_dx\":\"1\",\"kode_icdx\":\"A09\",\"nama_penyakit\":\"Diare\"},{\"pasien\":[{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":2,\"Laki\":1},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0}],\"kode_dx\":\"2\",\"kode_icdx\":\"A14\",\"nama_penyakit\":\"TB Relaps \\/ Kategori II\"},{\"pasien\":[{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":1},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0}],\"kode_dx\":\"2\",\"kode_icdx\":\"A15\",\"nama_penyakit\":\"TB Paru BTA (+)\"},{\"pasien\":[],\"kode_dx\":\"2\",\"kode_icdx\":\"A16\",\"nama_penyakit\":\"TB Klinis  Termasuk Rongent (+) BTA (-)  \"},{\"pasien\":[{\"Perempuan\":0,\"Laki\":1},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":5,\"Laki\":13},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0},{\"Perempuan\":0,\"Laki\":0}],\"kode_dx\":\"2\",\"kode_icdx\":\"A18\",\"nama_penyakit\":\"TB Organ Lain\"},{\"pasien\":[],\"kode_dx\":\"3\",\"kode_icdx\":\"A30\",\"nama_penyakit\":\"Lepra\"},{\"pasien\":[],\"kode_dx\":\"3\",\"kode_icdx\":\"A31\",\"nama_penyakit\":\"Kusta PB\"},{\"pasien\":[],\"kode_dx\":\"3\",\"kode_icdx\":\"A32\",\"nama_penyakit\":\"Kusta MB\"},{\"pasien\":[],\"kode_dx\":\"20\",\"kode_icdx\":\"A33\",\"nama_penyakit\":\"Tetanus Neonatorum\"},{\"pasien\":[],\"kode_dx\":\"3\",\"kode_icdx\":\"A35\",\"nama_penyakit\":\"Tetanus Lainnya\"},{\"pasien\":[],\"kode_dx\":\"3\",\"kode_icdx\":\"A36\",\"nama_penyakit\":\"Diphtheria\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_laporan`
--

CREATE TABLE `jenis_laporan` (
  `id_jp` int(10) NOT NULL,
  `nama_laporan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_laporan`
--

INSERT INTO `jenis_laporan` (`id_jp`, `nama_laporan`) VALUES
(1, 'Laporan Bulanan'),
(2, 'Laporan Tribulan'),
(3, 'Laporan Tahunan'),
(4, 'Laporan 15 Penyakit Terbanyak Bulanan'),
(5, 'Laporan 15 Penyakit Terbanyak Tribulan'),
(6, 'Laporan 15 Penyakit Terbanyak Tahunan');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_penyakit`
--

CREATE TABLE `kategori_penyakit` (
  `kode_dx` int(20) NOT NULL,
  `kategori_penyakit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_penyakit`
--

INSERT INTO `kategori_penyakit` (`kode_dx`, `kategori_penyakit`) VALUES
(1, 'PENYAKIT INFEKSI PADA USUS'),
(2, 'PENYAKIT TUBERKULOSA'),
(3, 'PENYAKIT BAKTERI'),
(4, 'PENYAKIT VIRUS'),
(5, 'RIKETSIASIS & PENY. KRN ARTOPODA LAIN'),
(6, 'PENYAKIT KELAMIN'),
(7, 'PENYAKIT KRN PARASIT DAN AKIBAT KEMUDIAN'),
(8, 'GANGGUAN INDOKRIN, NUTRISI DAN METABOLIK'),
(9, 'DEFISIENSI ZAT GIZI'),
(10, 'PENY. PENYALAHGUINAAN OBAT & GANGGUAN JIWA'),
(11, 'PENYAKIT PADA OTAK & JARINGANNYA'),
(12, 'PENYAKIT MATA'),
(13, 'PENYAKIT TELINGA'),
(14, 'PENYAKIT JANTUNG '),
(15, 'PENYAKIT LAIN SUSUNAN PEREDARAN DARAH'),
(16, 'PENYAKIT SISTEM PERNAPASAN ATAS'),
(17, 'PENYAKIT RONGGA MULUT'),
(18, 'PENYAKIT PADA SALURAN PENCERNAAN'),
(19, 'PENYAKIT PADA SALURAN KENCING'),
(20, 'KEHAMILAN, PERSALINAN DAN MASA NFAS'),
(21, 'KEGANASAN'),
(22, 'KECELAKAAN DAN KERACUNAN'),
(23, 'PENYAKIT KULIT DAN JARINGAN SUB KUTAN'),
(24, 'PENYAKIT PADA SISTEM OTOT DAN JARINGAN PENGIKAT'),
(25, 'KEADAAN TERTENTU PADA MASA PERINATAL'),
(26, 'KECACATAN'),
(27, 'GEJALA, TANDA, PENEMUAN KLINIS DAN LABORATORIUM YANG BANORMAL'),
(28, 'FAKTOR BERPENGARUH PADA STATUS KESEHATAN DAN KUNJUNGAN PADA PELAYANAN KESEHATAN'),
(29, 'PENYAKIT TAMBAHAN LAIN-LAIN');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_lb1`
--

CREATE TABLE `laporan_lb1` (
  `id_lb` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_icdx` varchar(50) NOT NULL,
  `kategori_umur` varchar(50) NOT NULL,
  `id_umr` int(20) NOT NULL,
  `kasus` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan_lb1`
--

INSERT INTO `laporan_lb1` (`id_lb`, `tanggal`, `kode_icdx`, `kategori_umur`, `id_umr`, `kasus`, `jenis_kelamin`) VALUES
(1, '2020-05-05', 'A18', '0-7 Hari', 1, 'Baru', 'Laki-laki'),
(2, '2020-05-07', 'A18', '0-7 Hari', 1, 'Baru', 'Laki-laki'),
(3, '2020-05-09', 'A18', '8-28 Hari', 2, 'Baru', 'Laki-laki'),
(4, '2020-05-12', 'A18', '0-7 Hari', 1, 'Baru', 'Laki-laki'),
(5, '2020-05-06', 'A14', '0-7 Hari', 1, 'Baru', 'Laki-laki'),
(6, '2020-05-12', 'A14', '0-7 Hari', 1, 'KKL', 'Perempuan'),
(8, '2020-02-11', 'A06', '0-7 Hari', 1, 'Baru', 'Laki-laki'),
(9, '2020-03-10', 'A06', '8-28 Hari', 2, 'Lama', 'Laki-laki'),
(10, '2020-04-16', 'A00', '0-7 Hari', 1, 'Baru', 'Perempuan'),
(11, '2020-01-08', 'A06', '8-28 Hari', 2, 'Lama', 'Laki-laki'),
(12, '2020-05-21', 'A09', '0-7 Hari', 1, 'Baru', 'Laki-laki'),
(13, '2020-05-21', 'B00', '0-7 Hari', 1, 'Baru', 'Perempuan'),
(14, '2020-05-21', 'A80', '8-28 Hari', 2, 'Lama', 'Perempuan'),
(15, '2020-05-21', 'B18', '0-7 Hari', 1, 'Lama', 'Perempuan'),
(16, '2020-05-21', 'B24', '>29-1 Tahun', 3, 'Baru', 'Perempuan'),
(17, '2020-05-21', 'B58', '1-4 Tahun', 4, 'Lama', 'Laki-laki'),
(18, '2020-05-21', 'B36.0', '8-28 Hari', 2, 'Lama', 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit_terbanyak`
--

CREATE TABLE `penyakit_terbanyak` (
  `id_pb` int(10) NOT NULL,
  `kode_icdx` varchar(20) NOT NULL,
  `nama_penyakit` varchar(220) NOT NULL,
  `jumlah_laki` int(50) NOT NULL,
  `jumlah_PR` int(50) NOT NULL,
  `bulan` date NOT NULL,
  `tahun` date NOT NULL,
  `total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `no_register` int(20) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `umur` int(20) NOT NULL,
  `id_umr` int(20) NOT NULL,
  `jenis_umur` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `jenis_pekerjaan` varchar(20) NOT NULL,
  `kode_penyakit` varchar(50) NOT NULL,
  `terapi` varchar(500) NOT NULL,
  `no_bpjs` int(50) NOT NULL,
  `dalam_wilayah` varchar(20) NOT NULL,
  `luar_wilayah` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`no_register`, `tanggal`, `nama`, `alamat`, `umur`, `id_umr`, `jenis_umur`, `jenis_kelamin`, `jenis_pekerjaan`, `kode_penyakit`, `terapi`, `no_bpjs`, `dalam_wilayah`, `luar_wilayah`) VALUES
(2, '2020-05-13', 'Dena', 'Jl.Mayjen no.22', 28, 2, 'Hari', 'Laki-laki', 'Formal', 'A18', '-', 0, 'Lama', '-'),
(3, '2020-05-06', 'Alex', 'Jl.Mayjen no.23', 5, 1, 'Hari', 'Laki-laki', 'Informal', 'A18', 'Pulang', 0, '-', 'Baru'),
(4, '2020-05-06', 'Jeje', 'Jl.Mayjen no.23', 4, 4, 'Tahun', 'Laki-laki', 'Informal', 'A18', 'Rehat', 0, 'Baru', '-'),
(5, '2020-05-12', 'Yully Ayu', 'Lamongan', 21, 8, 'Tahun', 'Perempuan', 'Formal', 'A18', 'semangat', 0, 'Baru', '-'),
(6, '2020-05-08', 'Rio', 'Jalan Bunga Duri', 14, 6, 'Tahun', 'Laki-laki', 'Formal', 'A18', 'Rebahan', 0, '-', 'Baru'),
(7, '2020-05-06', 'Nana', 'Jl. Cinta Duka', 3, 1, 'Hari', 'Laki-laki', 'Informal', 'A18', 'Rebahan', 0, 'Baru', '-'),
(8, '2020-05-11', 'Ayun', 'LAMONGAN', 5, 1, 'Hari', 'Laki-laki', 'Informal', 'A18', 'Rebahan', 0, '-', 'Baru'),
(9, '2020-05-10', 'Muna', 'Jalan Bunga Duri', 6, 1, 'Hari', 'Laki-laki', 'Informal', 'A18', 'semangat', 0, 'Lama', '-'),
(10, '2020-05-08', 'Dili', 'Jl.Mayjen no.23', 6, 1, 'Hari', 'Perempuan', 'Formal', 'A18', 'semangat', 0, '-', 'Baru'),
(11, '2020-05-07', 'Sasa', 'Jalan Bunga Duri', 3, 1, 'Hari', 'Perempuan', 'Informal', 'A18', 'Rebahan', 0, 'Baru', '-'),
(24, '2020-05-03', 'Citra', 'jl. bunga ', 24, 2, 'Hari', 'Perempuan', 'Formal', 'A18', 'Rebahan', 0, '-', 'Baru'),
(28, '2020-04-15', 'Nana', 'jl. bunga ', 24, 2, 'Hari', 'Perempuan', 'Informal', 'A00', 'Rebahan', 0, 'Baru', '-'),
(29, '2020-05-09', 'laila', 'Jl.Mayjen no.22', 28, 2, 'Hari', 'Perempuan', 'Formal', 'A14', 'Rebahan', 0, 'Baru', '-'),
(30, '2020-05-07', 'Alena', 'Jl.Mayjen no.23', 7, 1, 'Hari', 'Laki-laki', 'Formal', 'A18', 'Rebahan', 0, 'Baru', '-'),
(31, '2020-05-11', 'Alex', 'LAMONGAN', 7, 1, 'Hari', 'Laki-laki', 'Formal', 'A15', 'Rebahan', 0, 'Baru', '-'),
(32, '2020-05-11', 'Coba', 'Jl.Mayjen no.22', 5, 1, 'Hari', 'Perempuan', 'Formal', 'A18', 'Rebahan', 0, 'Baru', '-'),
(36, '2020-05-08', 'Saly', 'Jl.Mayjen no.22', 28, 2, 'Hari', 'Laki-laki', '', 'A18', 'Rebahan', 0, 'Baru', '-'),
(38, '2020-03-11', 'Sa', 'jl. bunga anggrek', 7, 1, 'Hari', 'Laki-laki', 'Informal', 'A06', 'Rebahan', 0, 'Baru', '-'),
(41, '2020-02-04', 'Vera', 'jl. bunga melati', 10, 2, 'Hari', 'Laki-laki', 'Informal', 'A09', 'Rebahan', 0, '-', 'Lama'),
(42, '2020-05-04', 'Le', 'Jl. Suci', 6, 1, 'Hari', 'Perempuan', 'Informal', 'A01.0', 'Rebahan', 0, '-', 'Baru'),
(45, '2020-04-16', 'Caca', 'Jl. Suci', 24, 2, 'Hari', 'Perempuan', 'Formal', 'A03', 'Tidur', 0, '-', 'Baru'),
(46, '2020-01-16', 'Zen', 'jl. bunga anggrek', 24, 2, 'Hari', 'Laki-laki', 'Formal', 'A18', 'Rebahan', 0, 'Lama', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) DEFAULT NULL,
  `user_email` varchar(60) DEFAULT NULL,
  `user_password` varchar(40) DEFAULT NULL,
  `user_level` varchar(3) DEFAULT NULL,
  `jabatan` varchar(50) NOT NULL,
  `instansi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_level`, `jabatan`, `instansi`) VALUES
(1, 'Indah', 'email1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', 'Petugas RM', 'Puskesmas'),
(2, 'Dewi', 'email2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2', 'Petugas LB', 'Puskesmas'),
(3, 'Bagus', 'email3@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '3', 'Kepala ', 'Puskesmas'),
(4, 'Beti', 'email4@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '4', 'Petugas P2TP', 'Dinas Kesehatan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_penyakit`
--
ALTER TABLE `data_penyakit`
  ADD PRIMARY KEY (`kode_icdx`);

--
-- Indexes for table `data_puskesmas`
--
ALTER TABLE `data_puskesmas`
  ADD PRIMARY KEY (`kd_puskesmas`);

--
-- Indexes for table `detail_laporan`
--
ALTER TABLE `detail_laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `id_jp` (`id_jp`);

--
-- Indexes for table `jenis_laporan`
--
ALTER TABLE `jenis_laporan`
  ADD PRIMARY KEY (`id_jp`);

--
-- Indexes for table `kategori_penyakit`
--
ALTER TABLE `kategori_penyakit`
  ADD PRIMARY KEY (`kode_dx`);

--
-- Indexes for table `laporan_lb1`
--
ALTER TABLE `laporan_lb1`
  ADD PRIMARY KEY (`id_lb`),
  ADD KEY `kode_icdx` (`kode_icdx`);

--
-- Indexes for table `penyakit_terbanyak`
--
ALTER TABLE `penyakit_terbanyak`
  ADD PRIMARY KEY (`id_pb`),
  ADD KEY `kode_icdx` (`kode_icdx`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`no_register`),
  ADD KEY `kode_penyakit` (`kode_penyakit`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_laporan`
--
ALTER TABLE `detail_laporan`
  MODIFY `id_laporan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `jenis_laporan`
--
ALTER TABLE `jenis_laporan`
  MODIFY `id_jp` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `laporan_lb1`
--
ALTER TABLE `laporan_lb1`
  MODIFY `id_lb` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `penyakit_terbanyak`
--
ALTER TABLE `penyakit_terbanyak`
  MODIFY `id_pb` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_laporan`
--
ALTER TABLE `detail_laporan`
  ADD CONSTRAINT `detail_laporan_ibfk_1` FOREIGN KEY (`id_jp`) REFERENCES `jenis_laporan` (`id_jp`);

--
-- Constraints for table `laporan_lb1`
--
ALTER TABLE `laporan_lb1`
  ADD CONSTRAINT `laporan_lb1_ibfk_1` FOREIGN KEY (`kode_icdx`) REFERENCES `data_penyakit` (`kode_icdx`);

--
-- Constraints for table `penyakit_terbanyak`
--
ALTER TABLE `penyakit_terbanyak`
  ADD CONSTRAINT `penyakit_terbanyak_ibfk_1` FOREIGN KEY (`kode_icdx`) REFERENCES `data_penyakit` (`kode_icdx`);

--
-- Constraints for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD CONSTRAINT `rekam_medis_ibfk_1` FOREIGN KEY (`kode_penyakit`) REFERENCES `data_penyakit` (`kode_icdx`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
