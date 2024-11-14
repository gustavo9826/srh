<!-- CODIGO QUE EJECTURA EL PAGINADOR DE LA APLICACION -->
<br>
<div class="container d-flex justify-content-center">
    <div class="btn-group" role="group" aria-label="Basic example">
        <button onclick="paginatorMin5();" style="background-color: transparent; width: 25px; padding: 5px;"
            type="button" class="btn btn-primary">
            <i class="ti-control-skip-backward" style="font-size: 10px; color:#777777"></i>
        </button>
        <button onclick="paginatorMin1();" type="button" style="background-color: transparent; width: 25; padding: 5px;"
            class="btn btn-primary">
            <i class="ti-arrow-left" style="font-size: 10px; color:#777777"></i>
        </button>

        <label id="is_iteratorMin" class="circle-label-none"></label>
        <label id="is_iterator" class="circle-label"></label>
        <label id="is_iteratorMax" class="circle-label-none"></label>

        <button onclick="paginatorMax1();" type="button"
            style="background-color: transparent; width: 25px; padding: 5px;" class="btn btn-primary">
            <i class="ti-arrow-right" style="font-size: 10px; color:#777777"></i>
        </button>
        <button onclick="paginatorMax5();" type="button"
            style="background-color: transparent; width: 25px; padding: 5px;" class="btn btn-primary">
            <i class="ti-control-skip-forward" style="font-size: 10px; color:#777777"></i>
        </button>
    </div>
</div>