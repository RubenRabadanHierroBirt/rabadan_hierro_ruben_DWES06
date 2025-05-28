package com.example.microserviciodummy.service;

import com.example.microserviciodummy.model.Vendedor;
import org.springframework.stereotype.Service;

import java.util.Arrays;
import java.util.List;

@Service
public class VendedorService {

    public List<Vendedor> getTodos() {
        return Arrays.asList(
            new Vendedor(1, "Juan Pérez", "juan@example.com", 612345678, true),
            new Vendedor(2, "Ana García", "ana@example.com", 698765432, false),
            new Vendedor(3, "Carlos Ruiz", "carlos@example.com", 678901234, false)
        );
    }
}
