package com.example.microservicio.model;

import jakarta.persistence.*;

@Entity
@Table(name = "stock")
public class Stock {

    @Id
    private int articuloId;

    private int cantidad;

    public Stock() {}

    public Stock(int articuloId, int cantidad) {
        this.articuloId = articuloId;
        this.cantidad = cantidad;
    }

    public int getArticuloId() {
        return articuloId;
    }

    public void setArticuloId(int articuloId) {
        this.articuloId = articuloId;
    }

    public int getCantidad() {
        return cantidad;
    }

    public void setCantidad(int cantidad) {
        this.cantidad = cantidad;
    }
}
