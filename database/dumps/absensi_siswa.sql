

INSERT INTO `absensi` (`id_absensi`, `id_kelas`, `id_siswa`, `id_mata_pelajaran`, `tgl_absen`, `status_kehadiran`, `pertemuan_ke`, `created_at`, `updated_at`) VALUES
(8, 1, 2, 1, '2022-08-09', '1', 2, '2022-08-08 18:23:50', '2022-08-08 18:23:50'),
(9, 1, 3, 1, '2022-08-09', '1', 2, '2022-08-08 18:23:53', '2022-08-08 18:23:53'),
(10, 1, 2, 1, '2022-08-09', '1', 3, '2022-08-08 18:29:38', '2022-08-08 18:29:38'),
(11, 1, 3, 1, '2022-08-09', '1', 3, '2022-08-08 18:29:40', '2022-08-08 18:29:40'),
(16, 1, 2, 1, '2022-08-18', '1', 4, '2022-08-18 06:49:53', '2022-08-18 06:49:53'),
(17, 1, 3, 1, '2022-08-18', '1', 4, '2022-08-18 06:49:55', '2022-08-18 06:49:55'),
(18, 1, 2, 1, '2022-08-25', '0', 1, '2022-08-24 21:27:44', '2022-08-24 21:27:44'),
(19, 1, 3, 1, '2022-08-25', '2', 1, '2022-08-24 21:27:46', '2022-08-24 21:27:46'),
(32, 1, 2, 12, '2022-09-07', '1', 2, '2022-09-07 15:39:10', '2022-09-07 15:39:10'),
(33, 1, 3, 12, '2022-09-07', '2', 2, '2022-09-07 15:39:12', '2022-09-07 15:39:12'),
(34, 1, 4, 12, '2022-09-07', '1', 2, '2022-09-07 15:39:14', '2022-09-07 15:39:14'),
(35, 1, 2, 12, '2022-09-08', '0', 1, '2022-09-07 19:20:30', '2022-09-07 19:20:30'),
(36, 1, 3, 12, '2022-09-08', '0', 1, '2022-09-07 19:20:31', '2022-09-07 19:20:31'),
(37, 1, 4, 12, '2022-09-08', '1', 1, '2022-09-07 19:20:33', '2022-09-07 19:20:33');


INSERT INTO `jadwal_mengajar` (`id_jadwal_mengajar`, `id_mata_pelajaran`, `id_guru`, `id_kelas`, `id_semester`, `id_tahun_ajaran`, `hari`, `jam_mengajar`, `jam_ke`, `created_at`, `updated_at`) VALUES
(3, 12, 17, 1, 1, 1, 'senin', '08:00:00', '1', '2022-08-26 15:13:46', '2022-08-26 15:13:46'),
(4, 12, 17, 2, 1, 1, 'senin', '11:00:00', '3', '2022-08-26 15:14:24', '2022-08-26 15:14:40'),
(5, 12, 17, 3, 1, 1, 'selasa', '08:00:00', '1', '2022-08-26 15:15:19', '2022-08-26 15:15:19'),
(6, 1, 17, 1, 1, 1, 'kamis', '08:00:00', '1', '2022-09-06 08:36:47', '2022-09-06 08:36:47'),
(7, 1, 27, 1, 1, 1, 'senin', '09:00:00', '2', '2022-09-06 08:37:14', '2022-09-06 08:37:14');



INSERT INTO `kelas` (`id_kelas`, `kode_kelas`, `nama_kelas`, `created_at`, `updated_at`) VALUES
(1, 'KL-4801077615', 'XII IPS', '2022-07-23 03:42:17', '2022-08-26 14:49:08'),
(2, 'KL-3746879295', 'XII MIPA 2', '2022-07-23 03:42:23', '2022-08-26 14:48:55'),
(3, 'KL-3107363065', 'XII MIPA 1', '2022-07-23 03:42:31', '2022-08-26 14:48:38'),
(5, 'KL-4843651123', 'X.1', '2022-08-26 14:49:23', '2022-08-26 14:49:23'),
(6, 'KL-5417918300', 'X.2', '2022-08-26 14:49:30', '2022-08-26 14:49:30'),
(7, 'KL-1443268936', 'X.3', '2022-08-26 14:49:38', '2022-08-26 14:49:38'),
(8, 'KL-6188118903', 'X.4', '2022-08-26 14:49:46', '2022-08-26 14:49:46'),
(9, 'KL-6314591347', 'XI MIPA 1', '2022-08-26 14:49:58', '2022-08-26 14:49:58'),
(10, 'KL-8031725139', 'XI MIPA 2', '2022-08-26 14:50:07', '2022-08-26 14:50:07'),
(11, 'KL-6052472385', 'XI IPS', '2022-08-26 14:50:18', '2022-08-26 14:50:18');



INSERT INTO `mata_pelajaran` (`id_mata_pelajaran`, `kode_mata_pelajaran`, `nama_mata_pelajaran`, `created_at`, `updated_at`) VALUES
(1, 'MP-2091618531', 'Bahasa Indonesia', '2022-07-23 04:21:08', '2022-07-26 18:07:05'),
(2, 'MP-0340701569', 'Matematika', '2022-07-26 18:07:28', '2022-07-26 18:07:28'),
(3, 'MP-9285232171', 'Bahasa Inggris', '2022-07-26 18:08:02', '2022-07-26 18:08:02'),
(4, 'MP-9679965577', 'Biologi', '2022-07-26 18:08:11', '2022-07-26 18:08:11'),
(5, 'MP-3626768840', 'Fisika', '2022-07-26 18:08:25', '2022-07-26 18:08:25'),
(6, 'MP-0791150063', 'Kimia', '2022-07-26 18:08:39', '2022-07-26 18:08:39'),
(7, 'MP-8005740096', 'Ekonomi', '2022-08-26 14:50:58', '2022-08-26 14:50:58'),
(8, 'MP-2581370382', 'Sosiologi', '2022-08-26 14:51:13', '2022-08-26 14:51:13'),
(9, 'MP-2502094233', 'Geografi', '2022-08-26 14:51:21', '2022-08-26 14:51:21'),
(10, 'MP-4570846583', 'Sejarah', '2022-08-26 14:51:35', '2022-08-26 14:51:35'),
(11, 'MP-6756576072', 'Pendidikan Agama Kristen', '2022-08-26 14:51:48', '2022-08-26 14:51:48'),
(12, 'MP-8710858886', 'TIK', '2022-08-26 15:12:35', '2022-08-26 15:12:35');


INSERT INTO `profile` (`id_profile`, `id_user`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `nisn`, `alamat`, `no_telp`, `nama_ayah`, `pekerjaan_ayah`, `nama_ibu`, `pekerjaan_ibu`, `tahun_masuk`, `tahun_lulus`, `no_ijazah`, `no_skhun`, `created_at`, `updated_at`) VALUES
(1, 1, 'L', 'jl;', '2021-11-26', 'jlkjlj', 'ljlj', 'jl', 'jlj', 'ljl', 'jljl', 'jlkjl', 2000, 2000, 'jlkjlkj', 'lkjl', '2021-11-23 19:34:44', '2021-11-23 19:56:23');


INSERT INTO `role_user` (`id_role_user`, `id_user`, `role`, `created_at`, `updated_at`) VALUES
(2, 1, 'guru_bk', '2022-10-15 05:20:44', '2022-10-15 05:20:44'),
(3, 1, 'wali_kelas', '2022-10-15 05:24:17', '2022-10-15 05:24:17'),
(4, 1, 'Administrator', '2022-10-15 05:29:20', '2022-10-15 05:29:20');


INSERT INTO `semester` (`id_semester`, `semester`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ganjil/2022-2023', '1', '2022-07-23 04:20:35', '2022-07-26 18:05:35'),
(2, 'Genap/2021-2022', '0', '2022-07-23 04:20:41', '2022-07-26 18:05:35');


-- INSERT INTO `siswa` (`id_siswa`, `id_kelas`, `nis`, `nama_siswa`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `foto`, `tahun_angkatan`, `no_wa_ortu`, `created_at`, `updated_at`) VALUES
-- (2, 1, '021003', 'AGSEL GIAN PONGTULURAN', 'makassar', '2007-01-01', 'L', 'makassar', '62dd3864f1097.jpg', '2021/2022', '6282192655828', '2022-07-23 12:17:41', '2022-08-26 15:01:24'),
-- (3, 1, '021004', 'ALTHAFAH FAIZAL WIRATARA', 'makassar', '2007-07-24', 'P', 'makassar', '62dd3ef0d89ec.jpg', '2021/2022', '6285757399827', '2022-07-23 12:45:37', '2022-08-26 15:02:39'),
-- (4, 1, '021037', 'MIRNA GASONG', 'makassar', '2007-01-01', 'P', 'makassar', '63095161adcf3.jpg', '2021/2022', '000', '2022-08-26 15:04:01', '2022-08-26 15:04:01');

INSERT INTO `tahun_ajaran` (`id_tahun_ajaran`, `tahun_ajaran`, `status`, `created_at`, `updated_at`) VALUES
(1, '2020/2021', '1', '2022-07-23 04:20:54', '2022-07-23 04:20:56'),
(2, '2021/2022', '0', '2022-08-26 14:50:37', '2022-08-26 14:50:37');


INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', NULL, '$2y$10$N6nmGrHUtLAw5/5SlPZqEehn.S5KDNDFHf1yuW184mEw5zLWhVeLm', 'Administrator', '62e10c00ac0d3.jpg', NULL, '2021-11-23 17:06:43', '2022-10-15 05:28:26'),
(10, 'Marthina Sattu Ari, S.Pd,M.Pd', 'martina@mail.com', NULL, '$2y$10$wWuEAUJUsns369wQ.4k2OeVQj7ql/1uvppDha5SZchprsR.1T9aa2', 'kepala_sekolah', '', NULL, '2022-08-26 14:38:20', '2022-08-26 14:38:20'),
(11, 'Asri Seli Pauang, S.PAK', 'asri@mail.com', NULL, '$2y$10$6fWgkbokhOd5/5kj3/NWmOKiEnuvaYhpQr9oBjmB/7HSp2dsNcD42', 'wakasek_kesiswaan', '', NULL, '2022-08-26 14:40:17', '2022-08-26 14:40:17'),
(12, 'Grace Lisurara Sura, S.Pd', 'grace@mail.com', NULL, '$2y$10$NDwaXxox5axaix4cW18yWOUIQM3Y46Q9cO7I5A.1XtyiDKErgg.Ey', 'guru_bk', '', NULL, '2022-08-26 14:41:01', '2022-08-26 14:41:01'),
(13, 'Yandri Patintingan, S.Kom', 'yandri@mail.com', NULL, '$2y$10$/k1.a1XECEa4MksB.ZnMguWzdWjYxASN8YGAPSbPyA/dLx0qgINAK', 'Administrator', '', NULL, '2022-08-26 14:41:36', '2022-08-26 14:41:36'),
(14, 'Eka Kamali Simin', 'eka@mail.com', NULL, '$2y$10$n15fy8C6BSPmJznp4ZUbAuPYlqofFgHZhNZbeptETNdR88JMOB0N2', 'Administrator', '', NULL, '2022-08-26 14:42:12', '2022-08-26 14:42:12'),
(15, 'Aris Palinggi', 'aris@mail.com', NULL, '$2y$10$gdBEP3H28Y6va0qdw4hfJeWDRncUnDsvYu9LFs6hLQsOhXHPkqI5W', 'Administrator', '', NULL, '2022-08-26 14:42:43', '2022-08-26 14:42:43'),
(16, 'Alexander, S.Pd', 'alex@mail.com', NULL, '$2y$10$uztB0SnZGp05FaoelSDmsu.HykaIlLP6NIDywbhmRTtp2rjMC.X7O', 'wali_kelas', '', NULL, '2022-08-26 14:43:35', '2022-08-26 14:55:49'),
(17, 'Yandri', 'yandrip@mail.com', NULL, '$2y$10$GEp4fuOqNb28H6MEbh5R8u829IN5cG11clxgxGRTAJJsiCo/DSiMO', 'guru', '', NULL, '2022-08-26 14:44:33', '2022-08-26 15:11:22'),
(18, 'Silce, S.Pd, MM', 'silce@mail.com', NULL, '$2y$10$QH6pYvKWLiuouXs0UovbBu/eyKTEsGGNOzjI43oVZfaCc/9sgy6cG', 'wali_kelas', '', NULL, '2022-08-26 14:45:11', '2022-08-26 14:56:10'),
(20, 'Martina Arruan Layuk, S.Pd', 'martinaa@mail.com', NULL, '$2y$10$d56ncyipjl671MO0IdRifO8kWIT1JwTuWfNsaJ3qhDFlHNCdjaYUi', 'wali_kelas', '', NULL, '2022-08-26 14:46:13', '2022-08-26 14:48:03'),
(21, 'Mintje Sampe Matana, S.Pd', 'mintje@mail.com', NULL, '$2y$10$NzcCaKKn4PZerC34BdoTS.vu9BfEougQMISezo1NS5aw3KOtc2MTi', 'wali_kelas', '', NULL, '2022-08-26 14:47:06', '2022-08-26 14:56:46'),
(22, 'Dian Jauhari, SS', 'dian@mail.com', NULL, '$2y$10$J.F9XRdJSzmhLphkLYtIkOgpt3BVLV/LCnmVPQhC6bL4dxi46LAwi', 'wali_kelas', '', NULL, '2022-08-26 14:53:06', '2022-08-26 14:57:01'),
(23, 'Martina Mada Serang, S.Pd', 'martinam@mail.com', NULL, '$2y$10$o.5B/Ip99RktownPDLKheOmYXD.FMNz9L/XjX0UJzfpPYeXs.joGq', 'wali_kelas', '', NULL, '2022-08-26 14:53:42', '2022-08-26 14:57:21'),
(24, 'Sunarti Fajanna, S.Sos', 'sunarti@mail.com', NULL, '$2y$10$CCT9H4W6P0poFPt0E0YqY.jN/Z3dFtvhHKrCQ/2xZp0WRNqGposZS', 'wali_kelas', '', NULL, '2022-08-26 14:54:15', '2022-08-26 14:57:41'),
(25, 'Yulita Siman, S.Pd', 'lita@mail.com', NULL, '$2y$10$vcbmdBfyMN7tz.n/Jj7Z8u1iTxjWat1IfSsfFFmATBegxJsVbdnHu', 'wali_kelas', '', NULL, '2022-08-26 14:54:42', '2022-08-26 14:57:51'),
(26, 'Beatrix Lora Andilolo, S.Pd', 'lora@mail.com', NULL, '$2y$10$5aCjg.etOr01ZwXK9wa1VOrfk6qRYPdtrRhJsH9/Bm4IPp5SeflY2', 'wali_kelas', '', NULL, '2022-08-26 14:55:09', '2022-08-26 14:58:48'),
(27, 'Silce, S.Pd, MM', 'silcee@mail.com', NULL, '$2y$10$FYbXroH.TYe2Ixlr2madDupozsOaD1hUaxuHHxbzcrWppgF41TsJO', 'guru', '', NULL, '2022-08-26 15:10:14', '2022-08-26 15:10:14');



INSERT INTO `wali_kelas` (`id_wali_kelas`, `id_guru`, `id_kelas`, `created_at`, `updated_at`) VALUES
(9, 20, 2, '2022-08-26 14:48:03', '2022-08-26 14:48:03'),
(10, 16, 1, '2022-08-26 14:55:49', '2022-08-26 14:55:49'),
(11, 18, 3, '2022-08-26 14:56:10', '2022-08-26 14:56:10'),
(12, 21, 5, '2022-08-26 14:56:46', '2022-08-26 14:56:46'),
(13, 22, 11, '2022-08-26 14:57:01', '2022-08-26 14:57:01'),
(14, 23, 6, '2022-08-26 14:57:21', '2022-08-26 14:57:21'),
(15, 24, 7, '2022-08-26 14:57:41', '2022-08-26 14:57:41'),
(16, 25, 8, '2022-08-26 14:57:51', '2022-08-26 14:57:51'),
(18, 26, 9, '2022-08-26 14:58:48', '2022-08-26 14:58:48');

