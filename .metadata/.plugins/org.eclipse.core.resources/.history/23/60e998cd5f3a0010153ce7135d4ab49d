package com.example.microserviciodummy.controller;

import com.example.microserviciodummy.model.Vendedor;
import com.example.microserviciodummy.service.VendedorService;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/api/vendedor")
public class VendedorController {

    private final VendedorService vendedorService;

    public VendedorController(VendedorService vendedorService) {
        this.vendedorService = vendedorService;
    }

    @GetMapping
    public List<Vendedor> getTodos() {
        return vendedorService.getTodos();
    }
}
