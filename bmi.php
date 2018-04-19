<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>SuperSaiyan</title>
    <meta name="author" content="Mateusz Ciałowicz"/>
	<meta name="description" content="Trening, dieta, odżywki" />
	<meta name="keywords" content="trener, trening, dieta, personalny" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style/style.css"/>
	<link rel="stylesheet" href="style/style_log.css"/>
	<link rel="Shortcut icon" href="img/top_icon.ico" />
	
    
    
<script type="text/javascript">
			function calculateBmi() {
				var weight = document.bmiForm.weight.value
				var height = document.bmiForm.height.value
				if(weight >= 30 && weight <= 200 && height > 0){	
					var finalBmi = weight/(height/100*height/100)
					document.bmiForm.bmi.value = Math.round(finalBmi)
                    
					if(finalBmi < 18.5){
						document.bmiForm.meaning.value = "Niedowaga"
					}
					if(finalBmi > 18.5 && finalBmi <= 25){
						document.bmiForm.meaning.value = "Waga prawidłowa"
					}
					if(finalBmi > 25 && finalBmi <= 30){
						document.bmiForm.meaning.value = "Nadwaga"
					}
                    
                    if(finalBmi > 30 && finalBmi <= 39){
						document.bmiForm.meaning.value = "Otyłość"
					}
                    if(finalBmi > 39){
						document.bmiForm.meaning.value = "Otyłość, zagrożenie życia!"
					}
                    
				}
                else if (weight < 30){
                    alert("Podaj prawidłową wagę! Poniżej 30kg to zdecydowanie za mało jak na człowieka!")
                }
                else if (weight > 200){
                    alert("Nie żartuj, na pewno nie ważysz ponad 200kg!")
                }
				else{
					alert("Uzupełnij wszystkie pola poprawnie!")
				}
			}
		</script>
    
    
    
    
    
</head>


<body>
    <div id="container">


    <div id="top_bar">
    
    <?php 
        $name = basename(__FILE__);
        include 'navbar.php';
    ?>
    </div>
    
    <div id="content">

        <div id="box">
      
        <form name="bmiForm">
                  <center>
			Waga(kg): <input type="number" name="weight" size="10" value="80"><br />
			Wzrost(cm): <select name="height"><option   value="120" >120</option><option   value="121" >121</option><option   value="122" >122</option><option   value="123" >123</option><option   value="124" >124</option><option   value="125" >125</option><option   value="126" >126</option><option   value="127" >127</option><option   value="128" >128</option><option   value="129" >129</option><option   value="130" >130</option><option   value="131" >131</option><option   value="132" >132</option><option   value="133" >133</option><option   value="134" >134</option><option   value="135" >135</option><option   value="136" >136</option><option   value="137" >137</option><option   value="138" >138</option><option   value="139" >139</option><option   value="140" >140</option><option   value="141" >141</option><option   value="142" >142</option><option   value="143" >143</option><option   value="144" >144</option><option   value="145" >145</option><option   value="146" >146</option><option   value="147" >147</option><option   value="148" >148</option><option   value="149" >149</option><option   value="150" >150</option><option   value="151" >151</option><option   value="152" >152</option><option   value="153" >153</option><option   value="154" >154</option><option   value="155" >155</option><option   value="156" >156</option><option   value="157" >157</option><option   value="158" >158</option><option   value="159" >159</option><option   value="160" >160</option><option   value="161" >161</option><option   value="162" >162</option><option   value="163" >163</option><option   value="164" >164</option><option   value="165" >165</option><option   value="166" >166</option><option   value="167" >167</option><option   value="168" >168</option><option   value="169" >169</option><option   value="170" >170</option><option   value="171" >171</option><option   value="172" >172</option><option   value="173" >173</option><option   value="174" >174</option><option   value="175" >175</option><option   value="176" >176</option><option   value="177" >177</option><option   value="178" >178</option><option   value="179" >179</option><option   value="180" selected="selected" >180</option><option   value="181" >181</option><option   value="182" >182</option><option   value="183" >183</option><option   value="184" >184</option><option   value="185" >185</option><option   value="186" >186</option><option   value="187" >187</option><option   value="188" >188</option><option   value="189" >189</option><option   value="190" >190</option><option   value="191" >191</option><option   value="192" >192</option><option   value="193" >193</option><option   value="194" >194</option><option   value="195" >195</option><option   value="196" >196</option><option   value="197" >197</option><option   value="198" >198</option><option   value="199" >199</option><option   value="200" >200</option><option   value="201" >201</option><option   value="202" >202</option><option   value="203" >203</option><option   value="204" >204</option><option   value="205" >205</option><option   value="206" >206</option><option   value="207" >207</option><option   value="208" >208</option><option   value="209" >209</option><option   value="210" >210</option><option   value="211" >211</option><option   value="212" >212</option><option   value="213" >213</option><option   value="214" >214</option><option   value="215" >215</option><option   value="216" >216</option><option   value="217" >217</option><option   value="218" >218</option><option   value="219" >219</option><option   value="219" >220</option></select> <br />
			<input type="button" value="Licz BMI" onClick="calculateBmi()"><br />
			Twój BMI:&nbsp;&nbsp;&nbsp; <input type="text" name="bmi" size="20" disabled="disabled" class="locked" text-align="center"><br />
			Informacja: <input type="text" name="meaning" size="20" disabled="disabled" class="locked"><br />
			<input type="reset" value="Reset" />
            </center>
		</form>
                
            </div>
        

   
    </div>    
     </div>
    <?php 
        $name = basename(__FILE__);
        include 'footer.php';
    ?> 


</body>

</html>