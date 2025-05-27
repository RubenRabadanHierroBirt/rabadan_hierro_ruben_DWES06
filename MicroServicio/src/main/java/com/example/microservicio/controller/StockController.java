package com.example.microservicio.controller;

import com.example.microservicio.model.Stock;
import com.example.microservicio.service.StockService;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.Map;
import java.util.List;

@RestController
@RequestMapping("/api/stock")
public class StockController {

    private final StockService stockService;

    public StockController(StockService stockService) {
        this.stockService = stockService;
    }

    @GetMapping
    public ResponseEntity<List<Stock>> getAllStock() {
        return ResponseEntity.ok(stockService.getAllStock());
    }

    @GetMapping("/{articuloId}")
    public ResponseEntity<?> getStock(@PathVariable("articuloId") int articuloId) {
        return stockService.getStock(articuloId)
                .map(ResponseEntity::ok)
                .orElseGet(() -> ResponseEntity.notFound().build());
    }


    @PostMapping
    public ResponseEntity<Stock> crearStock(@RequestBody Stock nuevoStock) {
        Stock creado = stockService.crearStock(nuevoStock);
        return ResponseEntity.ok(creado);
    }


    @PutMapping("/{articuloId}")
    public ResponseEntity<Stock> actualizarStock(@PathVariable("articuloId") int articuloId,
                                                 @RequestBody Map<String, Integer> payload) {
        if (!payload.containsKey("cantidad")) {
            return ResponseEntity.badRequest().build();
        }

        int nuevaCantidad = payload.get("cantidad");
        Stock actualizado = stockService.actualizarStock(articuloId, nuevaCantidad);
        return ResponseEntity.ok(actualizado);
    }
}
