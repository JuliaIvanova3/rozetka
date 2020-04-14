<template>
    <div class=" container-fluid bg-dark text-white">
    <div class="container"> 
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-12">
					<h6 class="text-uppercase font-weight-bold"> {{$t('help')}} </h6>
					<p>{{$t('guarantee')}}
					<br/>{{$t('deliveryAndPayMent')}}
					<br/>{{$t('serviceCenters')}}
					<br/> {{$t('g&a')}} </p>
				</div>
                <div class="col-lg-4 col-md-4 col-sm-12">
					<h6 class="text-uppercase font-weight-bold"> {{$t('infoOfCompany')}} </h6>
					<p>{{$t('about')}}
					<br/>{{$t('termsOfUse')}}
					<br/> {{$t('contacts')}}
					<br/> {{$t('vacancies')}} </p>
				</div>
				
				<div class="col-lg-4 col-md-4 col-sm-12">
					<h6 class="text-uppercase font-weight-bold"> {{$t('workSchedule')}} </h6>
					<p> {{$t('days')}}
					<br/> {{$t('hours')}}
					<br/> {{$t('city')}}
					<br/>+38009873525</p>
				</div>
			</div>
		</div>  
		<div class="footer-copyright text-center">© 2019 Copyright: MyWebsite.com</div>
    </div>
</template>

<script>
export default {
    name: 'main-footer'
	
}
</script>

<style scoped>
div {
	padding-top: 10px !important;
}
</style>