package config

import (
	"os"

	"github.com/joho/godotenv"
)

type Konfigurasi struct {
	NamaAplikasi string
	Port         string
	Lingkungan   string
	APIKey       string
	DbHost       string
	DbPort       string
	DbName       string
	DbUser       string
	DbSandi       string
}

func Muat() Konfigurasi {
	godotenv.Load()

	return Konfigurasi{
		NamaAplikasi: ambil("APP_NAME", "Fiber API"),
		Port:         ambil("APP_PORT", "3000"),
		Lingkungan:   ambil("APP_ENV", "local"),
		APIKey:       ambil("API_KEY", ""),
		DbHost:       ambil("DB_HOST", "localhost"),
		DbPort:       ambil("DB_PORT", "3306"),
		DbName:       ambil("DB_NAME", "fiber_db"),
		DbUser:       ambil("DB_USER", "root"),
		DbSandi:      ambil("DB_PASS", "Justdotzy69~"),
	}
}

func ambil(kunci string, bawaan string) string {
	nilai := os.Getenv(kunci)
	if nilai == "" {
		return bawaan
	}
	return nilai
}