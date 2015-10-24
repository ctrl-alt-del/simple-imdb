package main

import (
	"net/http"
	"encoding/json"
)

func Index(w http.ResponseWriter, r *http.Request) {
	users := Users{
		User{Name: "Welcome!"},
	}

	if err := json.NewEncoder(w).Encode(users); err != nil {
		panic(err)
	}
}
