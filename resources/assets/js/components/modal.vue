<template>
	<div class="">
		<div class="Modal mfp-hide col-12 col-sm-7" ref="modal">
		    <div class="Modal__inner">
		    	<slot></slot>
		    </div>
		</div>
	</div>
</template>
<script>
    import $ from 'jquery'
    import 'magnific-popup'
    export default{
    	name: 'modal',
    	props: {
		      show: {
		        type: Boolean,
		        default: false
		      },
		      config: {
		        type: Object,
		        default: function () {
		          return {
		            // magnific defaults
		            disableOn: null,
		            mainClass: '',
		            preloader: true,
		            focus: '',
		            closeOnContentClick: false,
		            closeOnBgClick: false,
		            closeBtnInside: true,
		            showCloseBtn: true,
		            enableEscapeKey: true,
		            modal: false,
		            alignTop: false,
		            index: null,
		            fixedContentPos: 'auto',
		            fixedBgPos: 'auto',
		            overflowY: 'auto',
		            removalDelay: 0,
		            // closeMarkup: '',
		            // prependTo: document.body,
		            autoFocusLast: true
		          }
		        }
		      }
		    },
    	data (){
    		return  {
                visible: this.show
            }
    	},
    	beforeCreated:function(){

    	},
    	created: function(){
    	 	// this.run()
        },
        mounted () {
	      // this[this.visible ? 'open' : 'close']()
	    },
        methods:{
		      open: function (options) {
		        if (!!$.magnificPopup.instance.isOpen && this.visible) {
		          return
		        }
		        let root = this
		        let config = _.extend(
		          this.config,
		          {
		            items: {
		              src: $(this.$refs.modal),
		              type: 'inline'
		            },
		            callbacks: {
		              open: function () {
		                root.visible = true
		                root.$emit('open')
		              },
		              close: root.close
		            }
		          },
		          options || {})
		        $.magnificPopup.open(config)
		      },
		      close: function () {
		        if (!$.magnificPopup.instance.isOpen && !this.visible) {
		          return
		        }
		        this.visible = false
		        $.magnificPopup.close()
		        this.$emit('close')
		      },
		      toggle: function () {
		        this[this.visible ? 'close' : 'open']()
		      }
         }
    }
</script>

<style lang="scss">
  .mfp-content {
    text-align: center;
  }
  $module: '.Modal';
  #{$module} {
    display: inline-block;
    position: relative;
    &__inner {
    	width: 100%;
    	display: inline-block;
    	text-align: left;
    }
    .mfp-close {
      width: auto;
      height: auto;
      font-size: 2em;
      line-height: 1;
      position: absolute;
      top: auto;
      right: auto;
      bottom: 100%;
      left: 100%;
      color: #fff;
      opacity: 1;
    }
  }
</style>