<template>
    <input
        type= 'text'
        :id='identity'
        :name='name'
        :value='value'
        :maxlength='maxlength'
        :placeholder='placeholder'
        :autocomplete='autocomplete'
        v-focus='focus'
        v-on='inputListeners'
    />
</template>

<script>
import Helper from '../../../../core/helper'
export default {
    props:{
        group:{
            type: String,
            required:false
        },
        name:{
            type: String,
            required: true
        },
        id:{
            type: String,
            required: false
        },
        value:{
            dafault: ''
        },
        currentValue:{
            default:''
        },
        placeholder:{
            type: String,
            required: false
        },
        focus:{
            type: Boolean,
            default: false
        },
        maxlength:{
             type: String,
             required: false
        },
        autocomplete:{
             type: String,
            required: false
        },
        validation:{
            type:[Array, Object],
            default: ()=> []
        }
        
    },
    data(){
        return{
            identity: this.id ? this.id : this.name,
            displayValidation:false
        }
    },
    computed:{
        inputListeners(){
            //this.$listeners is all default input listeners
            //attach any listener to the component
            //the input overrides the this.$Llistener
            return Object.assign({}, this.$listeners, {
                //whatever value that is inside the given input is passed into the emit method
                input: event => {
                    this.emit(event.target.value);
                }
            })
        }
    },
    mounted(){
        this.emit(this.currentValue);
        this.initialize()
        // console.log(emit(this.currentValue))
        
    },
    methods:{
        emit(value){
            // console.log(value)
            //inform anyone that listens to this event sends a message
            this.$emit('input', value);
        },
        initialize(){
            if(Helper.isEmpty(this.validation)){
                return;
            }
            let rules = this.validation;
            if (!Array.isArray(this.validation)){
                this.displayValidation= true
                rules= Object.keys(this.validation);
            }
            EventBus.fire('initialize-' + this.group, {
                field: this.name,
                rules:rules
            });
        }
        // console.log(value)
    }
}
</script>