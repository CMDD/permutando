<template>
  <div class>
    <section class="content-header">
      <h1>
        Usuarios
        <small>Listas</small>
      </h1>
      <ol class="breadcrumb">
        <li>
          <i class="fa fa-dashboard"></i>
          Dashboard
        </li>
        <li class="active">
          <i class="fa fa-book"></i>Usuarios
        </li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Listado de Usuarios</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="datatable-suscripciones" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Tel / Cel</th>
                <th>Email</th>
                <!-- <th>Accion</th> -->
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
    </section>
  </div>
</template>

<script>
import datatable from "datatables";

export default {
  mounted() {
    console.log("Component mounted.");
  },
  created() {
    $(document).ready(function() {
      $("#datatable-suscripciones").DataTable({
        serverSide: true,
        ajax: "api/lista-usuarios",
        columns: [
          { data: "id" },
          { data: "name" },
          { data: "tel" },
          { data: "email" }
          // { data: "btn" }
        ],
        language: {
          sProcessing: "Procesando...",
          sLengthMenu: "Mostrar _MENU_ registros",
          sZeroRecords: "No se encontraron resultados",
          sEmptyTable: "Ningún dato disponible en esta tabla",
          sInfo:
            "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          sInfoEmpty:
            "Mostrando registros del 0 al 0 de un total de 0 registros",
          sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
          sInfoPostFix: "",
          sSearch: "Buscar:",
          sUrl: "",
          sInfoThousands: ",",
          sLoadingRecords: "Cargando...",
          oPaginate: {
            sFirst: "Primero",
            sLast: "Último",
            sNext: "Siguiente",
            sPrevious: "Anterior"
          },
          oAria: {
            sSortAscending:
              ": Activar para ordenar la columna de manera ascendente",
            sSortDescending:
              ": Activar para ordenar la columna de manera descendente"
          }
        }
      });
    });
  },
  data() {
    return {
      sus: []
    };
  },
  methods: {}
};
</script>
