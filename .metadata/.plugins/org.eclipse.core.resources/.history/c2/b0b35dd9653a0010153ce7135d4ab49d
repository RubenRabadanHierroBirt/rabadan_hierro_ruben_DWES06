package com.example.microservicio.service;

import com.example.microservicio.model.Vendedor;
import com.example.microservicio.repository.VendedorRepository;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class VendedorService {

    private final VendedorRepository repository;

    public VendedorService(VendedorRepository repository) {
        this.repository = repository;
    }

    public List<Vendedor> getAll() {
        return repository.findAll();
    }

    public Vendedor save(Vendedor vendedor) {
        return repository.save(vendedor);
    }

    public void delete(int id) {
        repository.deleteById(id);
    }
}
