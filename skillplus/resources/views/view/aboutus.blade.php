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
 /*  h2, h3, h4, h5 {
    font-family: "Montserrat-Bold", sans-serif;
    font-weight: 700;
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



h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
    margin-bottom: 0.5rem;
    font-weight: 500;
    line-height: 1.2;
}

b, strong {
    font-weight: 700;
}

p {
    color: #212529;
    font-family: "Montserrat-Regular", sans-serif;
}
p {
    margin-top: 0;
    margin-bottom: 1rem;
}

h2, h3, h4, h5 {
    font-family: "Montserrat-Bold", sans-serif;
    font-weight: 700;
}
h2, .h2 {
    font-size: 1.75rem;
}
h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
    margin-bottom: 0.5rem;
    font-weight: 500;
    line-height: 1.2;
}
h1, h2, h3, h4, h5, h6 {
    margin-top: 0;
    margin-bottom: 0.5rem;
} */
</style>




<section class="aboutus-content aboutus-content-one">
    <div class="container">
       <div class="heading">
          <h2>
            <strong> About Us   </strong>   
          </h2>
          <hr style="margin-bottom: 10;">
       </div>
       <h2><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</strong></h2>
       <p><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</strong></p>
       <p>Cras non justo sed nulla finibus pulvinar sit amet et neque. Duis et odio vitae orci mattis gravida. Nullam vel tincidunt ex. Praesent vel neque egestas arcu feugiat venenatis. Donec eget dolor quis justo tempus mattis. Phasellus dictum nunc ut dapibus dictum. Etiam vel leo nulla. Ut eu mi hendrerit, eleifend lacus sed, dictum neque.</p>
       <p>Aliquam non convallis nibh. Donec luctus purus magna, et commodo urna fermentum sed. Cras vel ex blandit, pretium nulla id, efficitur massa. Suspendisse potenti. Maecenas vel vehicula velit. Etiam quis orci molestie, elementum nisl eget, ultricies felis. Ut condimentum quam ut mi scelerisque accumsan. Suspendisse potenti. Etiam orci purus, iaculis sit amet ornare sit amet, finibus sed ligula. Quisque et mollis libero, sit amet consectetur augue. Vestibulum posuere pellentesque enim, in facilisis diam dictum eget. Phasellus sed vestibulum urna, in aliquet felis. Vivamus quis lacus id est ornare faucibus at id nulla.</p>
       <h2><strong>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</strong></h2>
       <p>Nulla justo lectus, sollicitudin at lorem eu, sollicitudin molestie augue. Maecenas egestas facilisis dolor mattis feugiat. Donec sed orci tellus. Maecenas tortor ipsum, varius vel dolor nec, bibendum porttitor felis. Mauris rutrum tristique vehicula. Sed ullamcorper nisl non erat pharetra, sit amet mattis enim posuere. Nulla convallis fringilla tortor, at vestibulum mauris cursus eget. Ut semper sollicitudin odio, sed molestie libero luctus quis. Integer viverra rutrum diam non maximus. Maecenas pellentesque tortor et sapien fermentum laoreet non et est. Phasellus felis quam, laoreet rhoncus erat eget, tempor condimentum massa. Integer gravida turpis id suscipit bibendum. Phasellus pellentesque venenatis erat, ut maximus justo vulputate sed. Vestibulum maximus enim ligula, non suscipit lectus dignissim vel. Suspendisse eleifend lorem egestas, tristique ligula id, condimentum est.</p>
       <p>Mauris nulla nulla, laoreet at auctor quis, bibendum rutrum neque. Donec eu ligula mi. Nam cursus vulputate semper. Phasellus facilisis mollis tellus, interdum laoreet justo rutrum pulvinar. Praesent molestie, nibh sed ultrices porttitor, nulla tortor volutpat enim, quis auctor est sem et orci. Proin lacinia vestibulum ex ut convallis. Phasellus tempus odio purus.</p>
       <ul>
          <li>Nam lacinia urna eu arcu auctor, eget euismod metus sagittis.</li>
          <li>Etiam eleifend ex eu interdum varius.</li>
          <li>Nunc dapibus purus eu felis tincidunt, vel rhoncus erat tristique.</li>
          <li>Aenean nec augue sit amet lorem blandit ultrices.</li>
          <li>Nullam at lacus eleifend, pulvinar velit tempor, auctor nisi.</li>
       </ul>
       <p>Nunc accumsan tincidunt augue sed blandit. Duis et dignissim nisi. Phasellus sed ligula velit. Etiam rhoncus aliquet magna, nec volutpat nulla imperdiet et. Nunc vel tincidunt magna. Vestibulum lacinia odio a metus placerat maximus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam et faucibus neque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean et metus malesuada, ullamcorper dui vel, convallis est. Donec congue libero sed turpis porta consequat. Suspendisse potenti. Aliquam pharetra nibh in magna iaculis, non elementum ipsum luctus.</p>
    </div>
 </section>
 
 

@endsection
