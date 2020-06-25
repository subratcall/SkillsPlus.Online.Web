@extends('view.layout.layout')
@section('title')
    {{{ get_option('site_title','') }}} - {{{ $category->title or 'Categories' }}}
@endsection
@section('page')
<style>

.aboutus-content-one {
    margin-top: 30px;
}
article, aside, figcaption, figure, footer, header, hgroup, main, nav, section {
    display: block;
}

.container {
    max-width: 1200px;
}

.heading {
    margin-bottom: 15px;
}

.heading h2 {
    font-size: 1.25rem;
    margin-bottom: -10px;
    text-transform: uppercase;
    display: flex;
    justify-content: space-between;
    margin-top: -5px;
}
h2, h3, h4, h5 {
    font-family: "Montserrat-Bold", sans-serif;
    font-weight: 700;
}

hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
        border-top-color: currentcolor;
        border-top-style: none;
        border-top-width: 0px;
    border-top: 1px solid rgba(0, 0, 0, 0.1);
}
hr {
    box-sizing: content-box;
    height: 0;
    overflow: visible;
}



</style>


<section class="aboutus-content aboutus-content-one">
    <div class="container">
      <div class="heading">
        <h2>
        Privacy Policy      </h2>
        <hr style="margin-bottom: 10;">
      </div>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy &nbsp; text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>     
    </div>
  
  </section>
 
 

@endsection
