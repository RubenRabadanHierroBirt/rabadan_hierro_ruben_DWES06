package com.example.microservicio.controller;

import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class PingController {

    @GetMapping("/api/stock/ping")
    public ResponseEntity<String> ping() {
        return ResponseEntity.ok("Microservicio de stock operativo");
    }
}
