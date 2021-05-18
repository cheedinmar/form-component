<template>
    <form novalidate>
        <slot
            :group= "group"
            :fields= "fields"
            :validation="validationBags"

        ></slot>

    </form>

</template>

<script>
export default {
    props:{
        //represents the identity associated with all form elements like input and buttons
         group:{
             type:String,
             required:true
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
            validationBags:{}
        }
    }
}
</script>