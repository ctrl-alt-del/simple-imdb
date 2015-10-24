package main

import (
	"log"
	"net/http"
)

func main() {

	router := NewRouter()

	server := http.Server{
		Addr: "127.0.0.1:8080",
		Handler: router,
	}
	log.Fatal(server.ListenAndServe())
}
