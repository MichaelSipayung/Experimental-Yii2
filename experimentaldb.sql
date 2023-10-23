create table t_extrakurikuler (
    pendaftar_id int(11) not null,
   
    nama_kegiatan_1 varchar(255),
    nama_kegiatan_2 varchar(255),
    nama_kegiatan_3 varchar(255),
    nama_kegiatan_4 varchar(255),

    predikat_kegiatan_1 int(10),
    predikat_kegiatan_2 int(10),
    predikat_kegiatan_3 int(10),
    predikat_kegiatan_4 int(10),


    tanggal_kegiatan_1 date DEFAULT NULL,
    tanggal_kegiatan_2 date DEFAULT NULL,
    tanggal_kegiatan_3 date DEFAULT NULL,
    tanggal_kegiatan_4 date DEFAULT NULL,

    tanggal_kegiatan_1_end date DEFAULT NULL,
    tanggal_kegiatan_2_end date DEFAULT NULL,
    tanggal_kegiatan_3_end date DEFAULT NULL,
    tanggal_kegiatan_4_end date DEFAULT NULL
);
//insert pendaftar_id to t_extrakurikuler
insert into t_extrakurikuler (pendaftar_id) values (13547);

create table t_organisasi (
    pendaftar_id int(11) not null,
   
    nama_organisasi_1 varchar(255),
    nama_organisasi_2 varchar(255),
    nama_organisasi_3 varchar(255),insert into t_extrakurikuler (pendaftar_id) values (13547);

    nama_organisasi_4 varchar(255),

    jabatan_organisasi_1 int(10),
    jabatan_organisasi_2 int(10),
    jabatan_organisasi_3 int(10),
    jabatan_organisasi_4 int(10),

    tanggal_organisasi_1 date DEFAULT NULL,
    tanggal_organisasi_2 date DEFAULT NULL,
    tanggal_organisasi_3 date DEFAULT NULL,
    tanggal_organisasi_4 date DEFAULT NULL,

    tanggal_organisasi_1_end date DEFAULT NULL,
    tanggal_organisasi_2_end date DEFAULT NULL,
    tanggal_organisasi_3_end date DEFAULT NULL,
    tanggal_organisasi_4_end date DEFAULT NULL
);
//insert pendaftar_id to t_organisasi
insert into t_organisasi (pendaftar_id) values (13547);

//remove pendaftar_id from t_organisasi where pendaftar_id = 13547
delete from t_organisasi where pendaftar_id = 13547;


