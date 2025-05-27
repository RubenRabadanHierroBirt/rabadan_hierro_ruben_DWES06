package com.example.microservicio.service;

import com.example.microservicio.model.Stock;
import com.example.microservicio.repository.StockRepository;
import org.springframework.stereotype.Service;

import java.util.Optional;
import java.util.List;

@Service
public class StockService {

    private final StockRepository repository;

    public StockService(StockRepository repository) {
        this.repository = repository;
    }

    public List<Stock> getAllStock() {
        return repository.findAll();
    }
    
    public Optional<Stock> getStock(int articuloId) {
        return repository.findById(articuloId);
    }

    public Stock crearStock(Stock nuevo) {
        return repository.save(nuevo);
    }

    public Stock actualizarStock(int articuloId, int nuevaCantidad) {
        Stock stock = repository.findById(articuloId)
                .orElse(new Stock(articuloId, 0));

        stock.setCantidad(nuevaCantidad);
        return repository.save(stock);
    }
}
