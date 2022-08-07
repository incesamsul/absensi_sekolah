

INSERT INTO `jadwal_mengajar` (`id_jadwal_mengajar`, `id_mata_pelajaran`, `id_guru`, `id_kelas`, `id_semester`, `id_tahun_ajaran`, `hari`, `jam_mengajar`, `jam_ke`, `created_at`, `updated_at`) VALUES
(2, 1, 8, 1, 2, 1, 'kamis', '16:36:00', '9', '2022-07-23 12:36:40', '2022-07-23 12:37:52');


INSERT INTO `kelas` (`id_kelas`, `kode_kelas`, `nama_kelas`, `created_at`, `updated_at`) VALUES
(1, 'KL-4801077615', 'X', '2022-07-23 11:42:17', '2022-07-27 02:03:42'),
(2, 'KL-3746879295', 'XI', '2022-07-23 11:42:23', '2022-07-27 02:03:53'),
(3, 'KL-3107363065', 'XII', '2022-07-23 11:42:31', '2022-07-27 02:04:03'),
(4, 'KL-0859090928', 'XIII', '2022-07-27 08:26:06', '2022-07-27 08:26:06');


INSERT INTO `mata_pelajaran` (`id_mata_pelajaran`, `kode_mata_pelajaran`, `nama_mata_pelajaran`, `created_at`, `updated_at`) VALUES
(1, 'MP-2091618531', 'Bahasa Indonesia', '2022-07-23 12:21:08', '2022-07-27 02:07:05'),
(2, 'MP-0340701569', 'Matematika', '2022-07-27 02:07:28', '2022-07-27 02:07:28'),
(3, 'MP-9285232171', 'Bahasa Inggris', '2022-07-27 02:08:02', '2022-07-27 02:08:02'),
(4, 'MP-9679965577', 'Biologi', '2022-07-27 02:08:11', '2022-07-27 02:08:11'),
(5, 'MP-3626768840', 'Fisika', '2022-07-27 02:08:25', '2022-07-27 02:08:25'),
(6, 'MP-0791150063', 'Kimia', '2022-07-27 02:08:39', '2022-07-27 02:08:39');

INSERT INTO `profile` (`id_profile`, `id_user`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `nisn`, `alamat`, `no_telp`, `nama_ayah`, `pekerjaan_ayah`, `nama_ibu`, `pekerjaan_ibu`, `tahun_masuk`, `tahun_lulus`, `no_ijazah`, `no_skhun`, `created_at`, `updated_at`) VALUES
(1, 1, 'L', 'jl;', '2021-11-26', 'jlkjlj', 'ljlj', 'jl', 'jlj', 'ljl', 'jljl', 'jlkjl', 2000, 2000, 'jlkjlkj', 'lkjl', '2021-11-24 03:34:44', '2021-11-24 03:56:23');

INSERT INTO `semester` (`id_semester`, `semester`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ganjil/2022-2023', '1', '2022-07-23 12:20:35', '2022-07-27 02:05:35'),
(2, 'Genap/2021-2022', '0', '2022-07-23 12:20:41', '2022-07-27 02:05:35');


INSERT INTO `siswa` (`id_siswa`, `id_kelas`, `nis`, `nama_siswa`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `foto`, `tahun_angkatan`, `no_wa_ortu`, `created_at`, `updated_at`) VALUES
(2, 1, '43434', 'romi', 'makassar', '0001-01-01', '', '0', '62dd3864f1097.jpg', '0', '', '2022-07-23 20:17:41', '2022-07-23 20:44:48'),
(3, 1, '343', 'doni', 'makassar', '2022-07-24', 'L', 'makassar', '62dd3ef0d89ec.jpg', '308', '', '2022-07-23 20:45:37', '2022-07-23 20:45:37');

INSERT INTO `tahun_ajaran` (`id_tahun_ajaran`, `tahun_ajaran`, `status`, `created_at`, `updated_at`) VALUES
(1, '2020/2021', '1', '2022-07-23 12:20:54', '2022-07-23 12:20:56');

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', NULL, '$2y$10$N6nmGrHUtLAw5/5SlPZqEehn.S5KDNDFHf1yuW184mEw5zLWhVeLm', 'Administrator', '62e10c00ac0d3.jpg', NULL, '2021-11-24 01:06:43', '2022-07-27 01:57:20'),
(5, 'dina', 'dina@mail.com', NULL, '$2y$10$lOSX0qNH/iFBsDmiHIa57en46x9uUgrrq.Ox.pKNKrZo4SxAqhHPy', 'wali_kelas', '', NULL, '2022-07-23 11:42:02', '2022-07-27 02:09:08'),
(6, 'firman', 'firman@mail.com', NULL, '$2y$10$Hr1actUsH1MrdFTghLVN2OafTOsbnkD6.gzrS/pxc/RCHmTkpVdp6', 'guru_bk', '', NULL, '2022-07-23 11:54:28', '2022-07-23 11:57:24'),
(7, 'sri', 'sri@mail.com', NULL, '$2y$10$v9/oAxphwfS6AffxGZZdU.XGnul5DqukTolYwZWHCCPkW57dKlMsu', 'wakasek_kesiswaan', '', NULL, '2022-07-25 08:59:48', '2022-07-25 08:59:48'),
(8, 'Kasmina Arifin', 'kasmina@mail.com', NULL, '$2y$10$3ksDUC.GMtYIR8vwXwnHQO9rr31fBCHUxkmoUYbP7ySBOF6h/o1li', 'guru', '', NULL, '2022-07-27 02:17:37', '2022-07-27 02:17:37'),
(9, 'Dwi', 'dwi@mail.com', NULL, '$2y$10$0xodxvy5qpiF/qhD3YOz2OFSeTBCBXG20gWjXlgzosv582NKvUFuO', 'kepala_sekolah', '', NULL, '2022-07-27 07:33:35', '2022-07-27 07:33:35');


INSERT INTO `wali_kelas` (`id_wali_kelas`, `id_guru`, `id_kelas`, `created_at`, `updated_at`) VALUES
(7, 6, 1, '2022-07-23 11:57:24', '2022-07-23 11:57:24'),
(8, 5, 2, '2022-07-27 02:09:08', '2022-07-27 02:09:08');

