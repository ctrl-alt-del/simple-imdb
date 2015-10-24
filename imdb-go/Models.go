package main

import "time"

type User struct {
	Id        string `json:"id"`
	Uuid      string `json:"uuid"`
	Name      string `json:"name"`
	Email     string `json:"email"`
	CreatedAt string `json:"created_at"`
	UpdatedAt string `json:"updated_at"`
	NowAt     time.Time
}

type Users []User
