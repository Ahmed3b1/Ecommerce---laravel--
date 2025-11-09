@extends('layouts.adminmaster')


@section('content')


    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header"><strong>Accordion</strong></div>
                <div class="card-body">
                    <p class="text-body-secondary small">Click the accordions below to expand/collapse the accordion content.</p>
                    <div class="example">
                        <a href="/adminaddcategory"><button class="btn btn-primary mb-3" type="button">Add Category</button></a>
                        <ul class="nav nav-underline-border" role="tablist">
                            <li class="nav-item" role="presentation"><a class="nav-link active" data-coreui-toggle="tab" href="#preview-1000" role="tab" aria-selected="true">
                                <svg class="icon me-2">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-media-play"></use>
                                </svg>All Categories</a></li>
                
                        </ul>
                        <div class="tab-content rounded-bottom">
                            <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
                                <div class="accordion" id="accordionExample">

                                    @foreach ($categories as $category)
                                        <div class="accordion-item">
                                            <h4 class="accordion-header" id="heading{{ $category->id }}">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-coreui-toggle="collapse"
                                                    data-coreui-target="#collapse{{ $category->id }}"
                                                    aria-expanded="false"
                                                    aria-controls="collapse{{ $category->id }}">
                                                    {{ $category->name }}
                                                </button>
                                                {{-- delete and edit buttons  --}}

                                                
                                                <a href="{{ route('admineditcategory', $category->id) }}">
                                                    <button class="btn btn-outline-success ms-3 mb-3" type="submit">Edit</button>
                                                </a>
                                                
                                                <a href="{{ route('admindeletecategory', $category->id) }}" 
                                                    onsubmit="return confirm('Are you sure you want to delete this category?');">
                                                    <button class="btn btn-outline-danger ms-3 mb-3" type="submit"
                                                        >Delete</button>
                                                </a>


                                                   
                                                
                                            
                                                {{-- delete and edit buttons  --}}
                                            </h4>

                                            <div id="collapse{{ $category->id }}" class="accordion-collapse collapse"
                                                aria-labelledby="heading{{ $category->id }}"
                                                data-coreui-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    @if($category->Product->count() > 0)
                                                        <ul>
                                                            @foreach ($category->Product as $product)
                                                                <li><a href="{{ route('adminedititem', $product->id) }}">{{ $product->name }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    @else
                                                        <p class="text-muted">No products in this category.</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection