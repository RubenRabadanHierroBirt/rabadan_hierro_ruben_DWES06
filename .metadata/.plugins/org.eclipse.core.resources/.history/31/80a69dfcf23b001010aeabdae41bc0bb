package com.example.microserviciodummy.service;

import com.example.microserviciodummy.model.Stock;
import org.springframework.stereotype.Service;

import java.util.HashMap;
import java.util.Map;

@Service
public class StockService {

    private final Map<Integer, Stock> stockData = new HashMap<>();

    public Stock getStock(int articuloId) {
        return stockData.getOrDefault(articuloId, new Stock(articuloId, 0));
    }

    public Stock crearStock(Stock nuevo) {
        stockData.put(nuevo.getArticuloId(), nuevo);
        return nuevo;
    }

    public Stock actualizarStock(int articuloId, int nuevaCantidad) {
        Stock stock = stockData.get(articuloId);
        if (stock != null) {
            stock.setCantidad(nuevaCantidad);
        } else {
            stock = new Stock(articuloId, nuevaCantidad);
            stockData.put(articuloId, stock);
        }
        return stock;
    }
}
