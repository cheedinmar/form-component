<template>
    <form novalidate>
        <slot
            :group= "group"
            :fields= "fields"
            :validation="validationBag"

        ></slot>

    </form>

</template>

<script>
export default {
    props:{
        //represents the identity associated with all form elements like input and buttons
         group:{
             type:String,
             required:false
         },
         //represents the action which will be triggered
         behaviour:{
             type:String,
             required: false
         }
    },
    data(){
        return{
            fields:{},
            validationBag:{}
        }
    },
    created(){
        EventBus.listen('initialize-' + this.group, this.initialize);
    },
    methods:{
        initialize(data){
            if(!this.validationBag.hasOwnProperty(data.field)){
                this.validationBag[data.field] = data.rules;
                
            }
        }
    }
}
</script> 