package com.example.microservicio.controller;

import com.example.microservicio.model.Vendedor;
import com.example.microservicio.service.VendedorService;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/api/vendedores")
public class VendedorController {

    private final VendedorService service;

    public VendedorController(VendedorService service) {
        this.service = service;
    }

    @GetMapping
    public List<Vendedor> getAll() {
        return service.getAll();
    }

    @PostMapping
    public Vendedor save(@RequestBody Vendedor vendedor) {
        return service.save(vendedor);
    }

    @DeleteMapping("/{id}")
    public void delete(@PathVariable int id) {
        service.delete(id);
    }
}