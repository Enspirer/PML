<!-- filter modal -->
<form method="post" action="{{route('frontend.search_result_function')}}" id="filter-form">
    {{csrf_field()}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search Filters</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <input type="text" name="search_keyword" class="form-control p-3 rounded-0" aria-label="search" placeholder="Search Property">
                            <!-- <input type="hidden" value="" name="categtype" id="modal-id"> -->
                        </div>
                        
                        <div class="row mt-3">
                            <div class="col-4 col-xs-12 col-tab-12">
                                <div>
                                    <label for="propertyType" class="form-label required">Property Type</label>
                                    <select class="form-select" aria-label="propertyType" name="propertyType" id="propertyType" onChange="renderFields()">

                                        <option value="" selected> Select </option>
                                        @foreach($property_types as $type)
                                            <option value="{{$type->id}}"> {{$type->property_type_name}} </option>
                                        @endforeach
                                    
                                    </select>
                                </div>  
                            </div>
                                
                            <div class="col-4 col-xs-12 col-tab-12">
                                <div>
                                    <label for="transaction_type" class="form-label required">Transaction Type</label>
                                    <select class="form-select" aria-label="transaction_type" name="transaction_type" id="transaction_type">
                                        <option value="">Select</option>
                                        <option value="sale">For sale</option>
                                        <option value="rent">For rent</option>
                                    </select>
                                </div> 
                            </div>
                                
                            <div class="col-4 col-xs-12 col-tab-12">
                                <div>
                                    <label for="min_price" class="form-label required">City</label>
                                    <select class="form-select areas" aria-label="Default select example" name="city">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </div>

                            <!-- <div class="col-3">
                                <div>
                                    <label for="category_type" class="form-label mb-0 required">Category</label>
                                    <select class="form-select" aria-label="category_type" name="category_type" id="category_type">
                                        <option value="">Select</option>
                                        <option value="residential">Residential</option>
                                        <option value="commercial">Commercial</option>
                                        <option value="tp_developer">TP Developer</option>
                                        <option value="investments">Investments</option>
                                    </select>
                                </div>
                            </div> -->
                            
                        </div>

                        

                        <div class="row mt-3">

                            <div class="col-4 col-xs-12 col-tab-12">
                                <div>
                                    <label for="min_price" class="form-label required">Min Price</label>
                                    <select class="form-select" aria-label="min_price" name="min_price" id="min_price">
                                        <option value="0">Unlimited</option>
                                        <option value="25000">25,000</option>
                                        <option value="50000">50,000</option>
                                        <option value="75000">75,000</option>
                                        <option value="100000">100,000</option>
                                        <option value="125000">125,000</option>
                                        <option value="150000">150,000</option>
                                        <option value="175000">175,000</option>
                                        <option value="200000">200,000</option>
                                        <option value="225000">225,000</option>
                                        <option value="250000">250,000</option>
                                        <option value="275000">275,000</option>
                                        <option value="300000">300,000</option>
                                        <option value="325000">325,000</option>
                                        <option value="350000">350,000</option>
                                        <option value="375000">375,000</option>
                                        <option value="400000">400,000</option>
                                        <option value="425000">425,000</option>
                                        <option value="450000">450,000</option>
                                        <option value="475000">475,000</option>
                                        <option value="500000">500,000</option>
                                        <option value="550000">550,000</option>
                                        <option value="600000">600,000</option>
                                        <option value="650000">650,000</option>
                                        <option value="700000">700,000</option>
                                        <option value="750000">750,000</option>
                                        <option value="800000">800,000</option>
                                        <option value="850000">850,000</option>
                                        <option value="900000">900,000</option>
                                        <option value="950000">950,000</option>
                                        <option value="1000000">1,000,000</option>
                                        <option value="1100000">1,100,000</option>
                                        <option value="1200000">1,200,000</option>
                                        <option value="1300000">1,300,000</option>
                                        <option value="1400000">1,400,000</option>
                                        <option value="1500000">1,500,000</option>
                                        <option value="1600000">1,600,000</option>
                                        <option value="1700000">1,700,000</option>
                                        <option value="1800000">1,800,000</option>
                                        <option value="1900000">1,900,000</option>
                                        <option value="2000000">2,000,000</option>
                                        <option value="2500000">2,500,000</option>
                                        <option value="3000000">3,000,000</option>
                                        <option value="3500000">3,500,000</option>
                                        <option value="4000000">4,000,000</option>
                                        <option value="4500000">4,500,000</option>
                                        <option value="5000000">5,000,000</option>
                                        <option value="5500000">5,500,000</option>
                                        <option value="6000000">6,000,000</option>
                                        <option value="6500000">6,500,000</option>
                                        <option value="7000000">7,000,000</option>
                                        <option value="7500000">7,500,000</option>
                                        <option value="10000000">10,000,000</option>
                                        <option value="15000000">15,000,000</option>
                                        <option value="20000000">20,000,000</option>
                                    </select>
                                </div> 
                            </div>                            

                            <div class="col-4 col-xs-12 col-tab-12">
                                <div>
                                    <label for="max_price" class="form-label required">Max Price</label>
                                    <select class="form-select" aria-label="max_price" name="max_price" id="max_price">
                                        <option value="0">Unlimited</option>
                                        <option value="25000">25,000</option>
                                        <option value="50000">50,000</option>
                                        <option value="75000">75,000</option>
                                        <option value="100000">100,000</option>
                                        <option value="125000">125,000</option>
                                        <option value="150000">150,000</option>
                                        <option value="175000">175,000</option>
                                        <option value="200000">200,000</option>
                                        <option value="225000">225,000</option>
                                        <option value="250000">250,000</option>
                                        <option value="275000">275,000</option>
                                        <option value="300000">300,000</option>
                                        <option value="325000">325,000</option>
                                        <option value="350000">350,000</option>
                                        <option value="375000">375,000</option>
                                        <option value="400000">400,000</option>
                                        <option value="425000">425,000</option>
                                        <option value="450000">450,000</option>
                                        <option value="475000">475,000</option>
                                        <option value="500000">500,000</option>
                                        <option value="550000">550,000</option>
                                        <option value="600000">600,000</option>
                                        <option value="650000">650,000</option>
                                        <option value="700000">700,000</option>
                                        <option value="750000">750,000</option>
                                        <option value="800000">800,000</option>
                                        <option value="850000">850,000</option>
                                        <option value="900000">900,000</option>
                                        <option value="950000">950,000</option>
                                        <option value="1000000">1,000,000</option>
                                        <option value="1100000">1,100,000</option>
                                        <option value="1200000">1,200,000</option>
                                        <option value="1300000">1,300,000</option>
                                        <option value="1400000">1,400,000</option>
                                        <option value="1500000">1,500,000</option>
                                        <option value="1600000">1,600,000</option>
                                        <option value="1700000">1,700,000</option>
                                        <option value="1800000">1,800,000</option>
                                        <option value="1900000">1,900,000</option>
                                        <option value="2000000">2,000,000</option>
                                        <option value="2500000">2,500,000</option>
                                        <option value="3000000">3,000,000</option>
                                        <option value="3500000">3,500,000</option>
                                        <option value="4000000">4,000,000</option>
                                        <option value="4500000">4,500,000</option>
                                        <option value="5000000">5,000,000</option>
                                        <option value="5500000">5,500,000</option>
                                        <option value="6000000">6,000,000</option>
                                        <option value="6500000">6,500,000</option>
                                        <option value="7000000">7,000,000</option>
                                        <option value="7500000">7,500,000</option>
                                        <option value="10000000">10,000,000</option>
                                        <option value="15000000">15,000,000</option>
                                        <option value="20000000">20,000,000</option>
                                    </select>
                                </div> 
                            </div>

                            <div class="col-4 col-xs-12 col-tab-12">
                                <div>
                                    <label for="listed_since" class="form-label required">Listed Since</label>
                                    <input type="date" name="listed_since" class="form-control" aria-label="listed_since">
                                </div> 
                            </div>
                        </div>


                        <div class="row" id="incoming_fields">
                            <div class="col-3 second-incoming-field">
                            
                            </div>
                        </div>

                    </div>
                        
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn rounded-pill me-2 p-0 p-2 filter-reset" style="border: 1px solid #CCCCCC; color: #23A1C0"><i class="fas fa-undo"></i> Reset</button>
                        <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2" style="background-color: #94ca60;"><i class="fas fa-search"></i>Search</button>
                    </div>
                </div>
            </div>
        </div>
</form>