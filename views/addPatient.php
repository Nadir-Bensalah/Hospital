<div class="form-content">
<div class="form">
    <div class="title"> Enregistrer Un Nouveau Patient </div>
    <!-- Ne Pas OUblier le htmlspecialchars -->
    <form action="<?=htmlspecialchars($_SERVER['PHP_SELF']) ?>"  method="POST" novalidate> 
    <!------------------------------------->


        <div class="user-details">
<!-- -------------------------------------------- NOM -------------------------------------------------  -->
            <div class="input-box">
                <label  for ="lastname"  class="details"> Nom * </label>
                <input  id="lastname" name = "lastname" type="text"  pattern="<?= REGEX_NAME ?>" value = "<?= $lastname ?? '' ?>"  placeholder="Entrez le Nom" required autocomplete="family-name">
                <p class="msgError"> <?=$error['lastname']?? '' ?> </p>
            </div>

<!-- -------------------------------------------- PRENOM -------------------------------------------------  -->

            <div class="input-box">
                <label  for ="firstname"  class="details"> Prénom * </label>
                <input  id="firstname" name = "firstname" type="text"  pattern="<?= REGEX_NAME ?>" value = "<?= $firstname ?? '' ?>"  placeholder="Entrez le Prénom" required autocomplete="given-name">
                <p class="msgError"> <?=$error['firstname']?? '' ?> </p>
            </div>

<!-- -------------------------------------------- TELEPHONE -------------------------------------------------  -->


            <div class="input-box">
                <label  for ="phone"  class="details"> Téléphone </label>
                <input  id="phone" name = "phone" type="text"  pattern="<?= REGEX_PHONE ?>" value = "<?= $phone ?? ''?>"  placeholder="Entrez le numéro de téléphone  " autocomplete="tel">
                <p class="msgError"> <?=$error['phone']?? '' ?> </p>
            </div>


<!-- -------------------------------------------- DATE DE NAISSANCE -------------------------------------------------  -->
 

            <div class="input-box">
                <label  for ="birthdate"  class="details"> Date de naissance *</label>
                <input  id="birthdate" name = "birthdate" type="date"  pattern="<?= REGEX_DATE_OF_BIRTH?>" value = "<?= $birthdate ?? date('Y-m-d') ?>"  placeholder="Entrez le numéro de téléphoone  ">
                <p class="msgError"> <?=$error['birthdate']?? '' ?> </p>
            </div>


<!-- -------------------------------------------- EMAIL -------------------------------------------------  -->

            <div class="input-box">
                <label  for ="email"  class="details"> Email * </label>
                <input  id="email" name = "email" type="email"  value = "<?= $email ?? '' ?>"  placeholder="Entrez l'adresse Mail  " autocomplete="email">
                <p class="msgError"> <?=$error['email']?? '' ?> </p>
            </div>


<!-- -------------------------------------------- VERIFICATION EMAIL -------------------------------------------------  -->


            <div class="input-box">
                <label  for ="emailVerif"  class="details"> Confirmation de l'adresse Mail * </label>
                <input  id="emailVerif" name = "emailVerif" type="emailVerif"  value = "<?= '' ?>"  placeholder="Confirmez l'adresse Mail  ">
                <p class="msgError"> <?=$error['emailVerif']?? '' ?> </p>
            </div>
        </div>

<!-- -------------------------------------------- Button Enregistrer -------------------------------------------------  -->

        <div class="button">
            <input type="submit" value="Enregistrer">
        </div>

    </form>
</div>
</div>