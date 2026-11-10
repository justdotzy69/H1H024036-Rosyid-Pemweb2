package repository

import (
	"latihan-fiber-api/internal/config"
	"latihan-fiber-api/internal/model"
)

type ProgramStudiJumlah struct {
	model.ProgramStudi
	JumlahMahasiswa int64 `json:"jumlah_mahasiswa"`
}

func AmbilProgramStudi() ([]ProgramStudiJumlah, error) {
	var daftar []ProgramStudiJumlah
	err := config.DB.Model(&model.ProgramStudi{}).
		Select(`program_studis.*,
			(SELECT COUNT(*) FROM mahasiswas
			 WHERE mahasiswas.program_studi_id = program_studis.id
			 AND mahasiswas.deleted_at IS NULL) AS jumlah_mahasiswa`).
		Order("program_studis.nama ASC").
		Scan(&daftar).Error
	return daftar, err
}