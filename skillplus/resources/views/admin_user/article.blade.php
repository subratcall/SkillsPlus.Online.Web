@extends('admin.newlayout.layout-vue')
@section('title')
Article
@endsection

@section('style')

@endsection

@section('page')
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                       <article-content></article-content>
                       {{-- <test-content></test-content> --}}
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection

@section('script')
<script>

</script>
@endsection