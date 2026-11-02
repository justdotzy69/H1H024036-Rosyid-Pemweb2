package middleware

import (
	"github.com/gofiber/fiber/v3"
	"latihan-fiber-api/internal/config"
)

func KunciApi() fiber.Handler {
	konf := config.Muat()

	return func(c fiber.Ctx) error {
		kunciDariHeader := c.Get("X-Api-Key")

		if kunciDariHeader == "" || kunciDariHeader != konf.APIKey {
			return c.Status(fiber.StatusUnauthorized).JSON(fiber.Map{
				"sukses": false,
				"pesan":  "Unauthorized: X-Api-Key tidak valid",
			})
		}

		return c.Next()
	}
}