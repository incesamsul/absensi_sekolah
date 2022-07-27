
INSERT INTO `absensi` (`id_absensi`, `id_kelas`, `id_siswa`, `tgl_absen`, `status_kehadiran`, `pertemuan_ke`, `created_at`, `updated_at`) VALUES
(13, 1, 2, '2022-07-24', '1', 2, '2022-07-24 06:08:24', '2022-07-24 06:08:24'),
(14, 1, 3, '2022-07-24', '2', 2, '2022-07-24 06:08:24', '2022-07-24 06:08:24'),
(17, 1, 2, '2022-07-24', '1', 3, '2022-07-24 06:09:31', '2022-07-24 06:09:31'),
(18, 1, 3, '2022-07-24', '1', 3, '2022-07-24 06:09:31', '2022-07-24 06:09:31'),
(19, 1, 2, '2022-07-24', '1', 4, '2022-07-24 06:09:38', '2022-07-24 06:09:38'),
(20, 1, 3, '2022-07-24', '2', 4, '2022-07-24 06:09:38', '2022-07-24 06:09:38'),
(21, 1, 2, '2022-07-24', '1', 5, '2022-07-24 06:09:42', '2022-07-24 06:09:42'),
(22, 1, 3, '2022-07-24', '1', 5, '2022-07-24 06:09:42', '2022-07-24 06:09:42'),
(23, 1, 2, '2022-07-24', '2', 6, '2022-07-24 06:09:49', '2022-07-24 06:09:49'),
(24, 1, 3, '2022-07-24', '2', 6, '2022-07-24 06:09:49', '2022-07-24 06:09:49'),
(25, 1, 2, '2022-07-24', '1', 7, '2022-07-24 06:10:01', '2022-07-24 06:10:01'),
(26, 1, 3, '2022-07-24', '2', 7, '2022-07-24 06:10:01', '2022-07-24 06:10:01'),
(27, 1, 2, '2022-07-24', '1', 8, '2022-07-24 06:10:05', '2022-07-24 06:10:05'),
(28, 1, 3, '2022-07-24', '1', 8, '2022-07-24 06:10:05', '2022-07-24 06:10:05'),
(29, 1, 2, '2022-07-24', '1', 9, '2022-07-24 06:10:09', '2022-07-24 06:10:09'),
(30, 1, 3, '2022-07-24', '1', 9, '2022-07-24 06:10:09', '2022-07-24 06:10:09'),
(31, 1, 2, '2022-07-24', '1', 1, '2022-07-24 06:54:25', '2022-07-24 06:54:25'),
(32, 1, 3, '2022-07-24', '0', 1, '2022-07-24 06:54:25', '2022-07-24 06:54:25');



INSERT INTO `jadwal_mengajar` (`id_jadwal_mengajar`, `id_mata_pelajaran`, `id_guru`, `id_kelas`, `id_semester`, `id_tahun_ajaran`, `hari`, `jam_mengajar`, `jam_ke`, `created_at`, `updated_at`) VALUES
(2, 1, 5, 1, 2, 1, 'kamis', '16:36:00', '9', '2022-07-23 20:36:40', '2022-07-23 20:37:52');


INSERT INTO `kelas` (`id_kelas`, `kode_kelas`, `nama_kelas`, `created_at`, `updated_at`) VALUES
(1, 'KL-4801077615', 'VI', '2022-07-23 19:42:17', '2022-07-23 19:42:17'),
(2, 'KL-3746879295', 'VII', '2022-07-23 19:42:23', '2022-07-23 19:42:23'),
(3, 'KL-3107363065', 'VII', '2022-07-23 19:42:31', '2022-07-23 19:42:31');


INSERT INTO `mata_pelajaran` (`id_mata_pelajaran`, `kode_mata_pelajaran`, `nama_mata_pelajaran`, `created_at`, `updated_at`) VALUES
(1, 'MP-2091618531', 'bahasa korea', '2022-07-23 20:21:08', '2022-07-23 20:21:08');






INSERT INTO `profile` (`id_profile`, `id_user`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `nisn`, `alamat`, `no_telp`, `nama_ayah`, `pekerjaan_ayah`, `nama_ibu`, `pekerjaan_ibu`, `tahun_masuk`, `tahun_lulus`, `no_ijazah`, `no_skhun`, `created_at`, `updated_at`) VALUES
(1, 1, 'L', 'jl;', '2021-11-26', 'jlkjlj', 'ljlj', 'jl', 'jlj', 'ljl', 'jljl', 'jlkjl', 2000, 2000, 'jlkjlkj', 'lkjl', '2021-11-24 11:34:44', '2021-11-24 11:56:23');


INSERT INTO `semester` (`id_semester`, `semester`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ganjil', '0', '2022-07-23 20:20:35', '2022-07-23 20:20:44'),
(2, 'genap', '1', '2022-07-23 20:20:41', '2022-07-23 20:20:44');

INSERT INTO `siswa` (`id_siswa`, `id_kelas`, `nis`, `nama_siswa`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `foto`, `tahun_angkatan`, `created_at`, `updated_at`) VALUES
(2, 1, '43434', 'romi', 'makassar', '0001-01-01', '', '0', '62dd3864f1097.jpg', '0', '2022-07-24 04:17:41', '2022-07-24 04:44:48'),
(3, 1, '343', 'doni', 'makassar', '2022-07-24', 'L', 'makassar', '62dd3ef0d89ec.jpg', '308', '2022-07-24 04:45:37', '2022-07-24 04:45:37');


INSERT INTO `tahun_ajaran` (`id_tahun_ajaran`, `tahun_ajaran`, `status`, `created_at`, `updated_at`) VALUES
(1, '2020/2021', '1', '2022-07-23 20:20:54', '2022-07-23 20:20:56');



INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', NULL, '$2y$10$N6nmGrHUtLAw5/5SlPZqEehn.S5KDNDFHf1yuW184mEw5zLWhVeLm', 'Administrator', '62dcc18f03162.jpg', NULL, '2021-11-24 09:06:43', '2022-07-23 19:50:39'),
(5, 'dina', 'dina@mail.com', NULL, '$2y$10$lOSX0qNH/iFBsDmiHIa57en46x9uUgrrq.Ox.pKNKrZo4SxAqhHPy', 'guru', '', NULL, '2022-07-23 19:42:02', '2022-07-23 20:31:17'),
(6, 'firman', 'firman@mail.com', NULL, '$2y$10$Hr1actUsH1MrdFTghLVN2OafTOsbnkD6.gzrS/pxc/RCHmTkpVdp6', 'wali_kelas', '', NULL, '2022-07-23 19:54:28', '2022-07-23 19:57:24');


INSERT INTO `wali_kelas` (`id_wali_kelas`, `id_guru`, `id_kelas`, `created_at`, `updated_at`) VALUES
(7, 6, 1, '2022-07-23 19:57:24', '2022-07-23 19:57:24');

