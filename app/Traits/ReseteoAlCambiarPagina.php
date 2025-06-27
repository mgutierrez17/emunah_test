<?php

namespace App\Traits;

trait ReseteoAlCambiarPagina
{
    public function updatingPage()
    {
        $this->resetErrorBag();
        $this->resetValidation();

        if (property_exists($this, 'mostrarFormulario')) {
            $this->mostrarFormulario = false;
        }

        if (property_exists($this, 'modo')) {
            $this->modo = 'crear';
        }

        if (property_exists($this, 'mostrarAlmacenForm')) {
            $this->mostrarAlmacenForm = false;
        }

        if (method_exists($this, 'resetFormulario')) {
            $this->resetFormulario();
        }

        // También puedes cerrar otros modales o variables temporales aquí
    }
}
