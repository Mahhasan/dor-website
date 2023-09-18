@extends('frontend.layouts.master')
@section('content')
<section class="cta">
    <div class="container">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading" style="font-family:Century Gothic;"><b>Finite element computational procedure for convective flow of nanofluids in an annulus</b></div>
                <div class="panel-body">
                    <b>Authors: M.J. Uddin, M.M. Rahman</b> <br>
                    <p></p>
                    <h4>ABSTRACT</h4>
                    <p></p>
                    <p>
                        In the present study, the detailed procedures of Galerkin weighted residual technique of finite element method
                        (FEM) for solving two-dimensional incompressible natural convective flow of nanofluids using nonhomogeneous
                        dynamic model are discussed for the first time. The physical domain is discretized by using unstructured triangular
                        elements. The governing partial differential equations of nanofluids are made dimensionless using the
                        suitable transformation of variables for weak formulations. The method of weighted residuals is used for obtaining
                        the approximate solutions. This approach typically leads to a sparse and indefinite matrix that is difficult
                        to solve efficiently. The formation of an indefinite matrix is avoided in the present work by introducing an
                        artificial compressibility term in the continuity equation. Unequal order interpolation functions are used for
                        pressure, velocity, temperature and concentration variables. The coefficient matrices are calculated using interpolation
                        functions. Assembling of triangular elements in the discretized domain is discussed elaborately. The
                        process of calculating boundary integrals is also discussed. The Newton-Raphson iteration technique along with
                        Euler-backward scheme is used to solve the global matrix. The sample results are obtained for the convective
                        flow of nanofluids in a concentric annulus. It shows that the annulus of having higher thickness is the best
                        performer enhancing convective heat transfer rates.
                    </p>
                    Source: <a href="https://www.sciencedirect.com/science/article/abs/pii/S2451904917300902" target="_blank">https://www.sciencedirect.com/science/article/abs/pii/S2451904917300902</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection