
    <button type="button" class="btn btn-dark mx-1" data-bs-toggle="modal" data-bs-target="{{ '#create-page-has-components' . $page_has_components->id }}">
        <i class="fa fa-plus"></i> Add Component
    </button>


    <!-- Modal -->
    <div class="modal fade" id="{{ 'create-page-has-components' . $page_has_components->id }}" tabindex="-1" aria-labelledby="create-page-has-components-model"
         aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="create-page-has-components-model">Add components to page - {{ $page_has_components->title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.pages.components.create', ['id' => $page_has_components->id]) }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body text-start">
                        <div class="col-md-12 mt-3">
                            <div class="row">
                                        <div class="form-group">
                                            <label for="component-select">Component</label> <span class="is-available badge " style=" display: none;background-color:#e7616a"> This component is already selected.</span>
                                            <select name="component-select" class="form-control" id="component-select" onChange="setSelectedComponent()">
                                                <option style="display:none">---Select and option----</option>
                                                @foreach($all_components as $all_component)
                                                    <option value="{{ $all_component->id.'-'.$all_component->name }}">{{ $all_component->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    <div id="selected-components" style="display: flex;">

                                    </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


