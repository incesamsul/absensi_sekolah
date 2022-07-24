
		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="{{ auth()->user()->foto == "" ? asset('stisla/assets/img/avatar/avatar-1.png') : asset('data/foto_profile/'.auth()->user()->foto) }}" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									{{ auth()->user()->name }}
									<span class="user-level">{{ auth()->user()->role }}</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">MENU PENGGUNA</h4>
                        </li>
                        <li class="nav-item" id="liDahshboard">
                            <a href="{{ URL::to('/dashboard') }}" class="collapsed" >
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item" id="liProfile">
							<a href="{{ URL::to('/profile') }}" class="collapsed" >
								<i class="fas fa-user"></i>
								<p>Profile</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">MENU {{ auth()->user()->role }}</h4>
						</li>
                        @if (auth()->user()->role == 'Administrator')
                        <li class="nav-item" id="liPengguna">
							<a href="{{ URL::to('/admin/pengguna') }}" class="collapsed" >
								<i class="fas fa-users"></i>
								<p>Pengguna</p>
							</a>
						</li>
						<li class="nav-item" id="liDataUmum">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-layer-group"></i>
								<p>Data Umum</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li id="liKelas">
										<a href="{{ URL::to('/admin/kelas') }}">
											<span class="sub-item">Kelas</span>
										</a>
									</li>
									<li id="liSemester">
										<a href="{{ URL::to('/admin/semester') }}">
											<span class="sub-item">Semester</span>
										</a>
									</li>
									<li id="liTahunAjaran">
										<a href="{{ URL::to('/admin/tahun_ajaran') }}">
											<span class="sub-item">Tahun ajaran</span>
										</a>
									</li>
									<li id="liMataPelajaran">
										<a href="{{ URL::to('/admin/mata_pelajaran') }}">
											<span class="sub-item">Mata Pelajaran</span>
										</a>
									</li>
									<li id="liWaliKelas">
										<a href="{{ URL::to('/admin/wali_kelas') }}">
											<span class="sub-item">Wali kelas</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
                        <li class="nav-item" id="liJadwalMengajar">
							<a href="{{ URL::to('/admin/jadwal_mengajar') }}" class="collapsed" >
								<i class="fas fa-list"></i>
								<p>Jadwal Mengajar</p>
							</a>
						</li>
                        <li class="nav-item" id="liDataSiswa">
							<a href="{{ URL::to('/admin/data_siswa') }}" class="collapsed" >
								<i class="fas fa-graduation-cap"></i>
								<p>Data siswa</p>
							</a>
						</li>
                        @endif
                        {{-- MENU GURU --}}
                        @if (auth()->user()->role == 'guru')
                        <li class="nav-item" id="liJadwalMengajar">
							<a href="{{ URL::to('/guru/jadwal_mengajar') }}" class="collapsed" >
								<i class="fas fa-list"></i>
								<p>Jadwal Mengajar</p>
							</a>
						</li>
                        <li class="nav-item" id="liPresensi">
							<a href="{{ URL::to('/guru/presensi') }}" class="collapsed" >
								<i class="fas fa-file"></i>
								<p>Presensi</p>
							</a>
						</li>
                        @endif
                        {{-- MENU WALI KELAS--}}
                        @if (auth()->user()->role == 'wali_kelas')
                        <li class="nav-item" id="liRekapAbsen">
							<a href="{{ URL::to('/wali_kelas/rekap_absen') }}" class="collapsed" >
								<i class="fas fa-list"></i>
								<p>Rekap absen</p>
							</a>
						</li>
                        @endif

						<li class="mx-4 mt-2">
							<a href="{{ URL::to("logout") }}" class="btn btn-primary btn-block"><span class="btn-label mr-2"> <i class="fa fa-sign-out-alt"></i> </span>Logout</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

