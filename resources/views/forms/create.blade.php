@extends('master')

@section('content')

@if(session()->has('message'))
    <div class="success">
        {{ session()->get('message') }}
    </div>
@endif

<data-form inline-template>
    <div class="form">
        <form action="/" method="POST">
            {{ csrf_field() }}

            <div class="form__stage">
                <div class="form__header">
                    <h4>Step 1: Your details</h4>
                </div>

                    <div class="form__fields-wrapper" v-show="active === 1">

                        <div class="form__fields">
                            <div class="form__flex">
                                <div class="form__field-wrapper">
                                    <label class="form__label" for="firstname">First Name</label>
                                    <input type="text" id="firstname" name="firstname" v-model="firstname" />
                                </div>
                                <div class="form__field-wrapper">
                                    <label class="form__label" for="surname">Surname</label>
                                    <input type="text" id="surname" name="surname" v-model="surname"/>
                                </div> 
                            </div>

                            <label class="form__label" for="email">Email Address:</label>
                            <input type="text" id="email" name="email" v-model="email"/>
                            

                            <button @click.prevent="next()">Next ></button>

                        </div>
                    </div>
            </div>

            <div class="form__stage">
                <div class="form__header">
                    <h4>Step 2: More comments</h4>
                </div>
                
                    <div class="form__fields-wrapper" v-show="active === 2">

                        <div class="form__fields">
                            <div class="form__flex">
                                <div class="form__field-wrapper">
                                    <label class="form__label" for="telephone">Telephone number:</label>
                                    <input type="text" id="telephone" name="telephone" v-model="telephone"/>
                                </div>
                                <div class="form__field-wrapper">
                                    <label class="form__label" for="gender">Gender</label>
                                    <select name="gender" id="gender" v-model="gender">
                                        <option value="select" selected>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>    

                            <label class="form__label" for="dob">Date of birth:</label>
                            <input type="hidden" name="dob" id="dob" :value="dob">
                            <input type="text" @blur="checkValue" class="small" name="day" v-model="day">
                            <input type="text" @blur="checkValue" class="small" name="month" v-model="month">
                            <input type="text" class="small" name="year" v-model="year">

                            <button @click.prevent="next()">Next ></button>
                        </div>
                    </div>
            </div>

            
            <div class="form__stage">
                <div class="form__header">
                    <h4>Step 3: Final comments</h4>
                </div>

                <div class="form__fields-wrapper" v-show="active === 3">

                    <div class="form__fields">
                        <label class="form__label" for="comments">Comments</label>
                        <textarea name="comments" id="comments" cols="30" rows="10" v-model="comments"></textarea>

                        <button type="submit">Next ></button>
                    </div> 

                </div> 

            </div>
        </form>
        <div v-if="errors.length" class="errors">
            <ul>
                <li v-for="error in errors">@{{ error }}</li>
            </ul>
        </div>
    </div>
</data-form>

@endsection

        

