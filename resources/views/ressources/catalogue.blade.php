@extends('layouts.base')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center py-2">
            <li class="breadcrumb-item"><a href="{{ route('ressources.index') }}" style="color: #007bff;">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page" style="color: #6c757d;">Catalogue des Ressources</li>
        </ol>
    </nav>
    <h1 class="text-center">Catalogue des Ressources</h1>
@endsection

@section('content')
 <div class="container mt-5 text-center text-muted">
        <div class="row mb-3">
            <div class="col-lg-12">
                <h2 class="text-center text-muted">Découvrez nos ressources disponibles</h2>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-lg-12">
                <h3>Salles de classe</h3>
                <p>Nombre total : 21 salles</p>
            </div>
            <div class="col-lg-12">
                <h3>Laboratoires</h3>
                <p>Nombre total : 3 laboratoires spécialisés</p>
            </div>
            <div class="col-lg-12">
                <h3>Équipement audiovisuel</h3>
                <p>Nombre total de vidéoprojecteurs : 19</p>
                <p>Nombre total de rallonges : 19</p>
                <p>Nombre total de câbles : 19</p>
            </div>
            <div class="col-lg-12">
                <h3>Accessoires</h3>
                <p>Marqueurs et effaceurs en quantité suffisante pour toutes les salles</p>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col-lg-12">
                <h2 class="text-center text-muted">Découvrez qu'elle que image de nos ressources </h2>
            </div>
        </div>

        <div class="row mb-5 mt-4">
            <div class="col-lg-12">
                <h3>Salles de classe</h3>
                <div class="row">
                    @foreach ($salleClasses as $salleClasse)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('assets/img/salle de classe.jpeg') }}" class="card-img-top" alt="Salle de Classe">
                            <div class="card-body">
                                <h5 class="card-title">{{ $salleClasse->nomRessource }}</h5>
                                <p class="card-text">Capacité : {{ $salleClasse->capacite }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-lg-12">
                <h3>Rallonges</h3>
                <div class="row">
                    @foreach ($rallonges as $rallonge)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('assets/img/rallonge.jpeg') }}" class="card-img-top" alt="Rallonge">
                            <div class="card-body">
                                <h5 class="card-title">Rallonge - {{ $rallonge->type }}</h5>
                                <p class="card-text">Longueur : {{ $rallonge->longueur }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-lg-12">
                <h3>Vidéoprojecteurs</h3>
                <div class="row">
                    @foreach ($videoProjecteurs as $videoProjecteur)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('assets/img/videoProjecteur.jpeg') }}" class="card-img-top" alt="Vidéoprojecteur">
                            <div class="card-body">
                                <h5 class="card-title">{{ $videoProjecteur->nomRessource }}</h5>
                                <p class="card-text">Modèle : {{ $videoProjecteur->modele }}</p>
                                <p class="card-text">Résolution : {{ $videoProjecteur->resolution }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <h3>Câbles</h3>
                <div class="row">
                    @foreach ($cables as $cable)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('assets/img/cable1.jpeg') }}" class="card-img-top" alt="Câble">
                            <div class="card-body">
                                <h5 class="card-title">Câble - {{ $cable->type }}</h5>
                                <p class="card-text">Longueur : {{ $cable->longueur }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- laboratoire --}}
        <div class="row">
            <div class="col-lg-12">
                <h3>Salle de reunion</h3>
                <div class="row">

                    <div class="col-md-4">
                        <div class="card">
                            <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxITEhUSExMVFhUXFhUXGBYXFxcWFxUVFRcXFhUVGBcYHSggGBomHRcXITEhJSkrLi4uFyAzODMtNygtLisBCgoKDg0OGhAQGCslHR8tLS0tLS0rLi0tLS0tKy0tLSstLS0tLS0tLSstLS0rLS0tLS0tLS0tLS0tLSstLS0tLf/AABEIAOAA4AMBIgACEQEDEQH/xAAcAAABBQEBAQAAAAAAAAAAAAAFAQIDBAYHAAj/xABQEAACAAQDBAUGCQgIBQQDAAABAgADBBESITEFBkFREyJhcZEyUoGhsdEUI1NikpPB0vAHFkJUcoKy4RUzNENzdLPCY6LT4vElg5SjNURk/8QAGQEBAQADAQAAAAAAAAAAAAAAAAECAwQF/8QAKhEAAgICAQQBAwMFAAAAAAAAAAECEQMSUQQUITFBE2FxIlLxI5GhsfD/2gAMAwEAAhEDEQA/AIN36jZ1LLFc06ZInkODLcXUkMQFCot2uBkb6G5EE528s9bYZzMOBuDcc9I5fLoJTkmpndAgdgericsBfCBw1GZgp8KkrKWSKrCFJOLCMZvfItguRplplGpyS/g2rE/+ZrazeWddXLksmIoTbqlhha2XEZRNL3sqTJluZrEstzko4kcB2RjKaopM+lrJxGVsBTXtxoYWtradskqWlotwi4sQCXOHWXe/O5MNlXr/AAPpu/j+6NHtLeOdNlmXMYupsSpta4Nxw5xgdqMVZuoVDYsOWRuEGXhFmtn4Gwie5yBvZWBuARytke30QuwadJznpATYYssrNcfzjNTSVmDxXLX5B8ljiGR1bgeKp7o1W65IRlPzT43+y3jEh2HT8m+lFmmpJcq5S/Wte5vppbxhDNGTSQl08oJtlpzFeboYkZogm6GOg0lrZdIMIPYIM00hb9kUKKZZFA81fGwyh8uqI01jYaPk19HVoi5Ad5Nv5mHPtm+Qa/7OXidRGWxOc3uOH8ojm12HIZfz0jDVGe7NFM2gqi5sT+OcAdo7VLcYFVFeeN/xl7YFVNWxJFjfPKxvztbu9kZUkY+WWqus7YEVNZFaqnta5BtYG9jax0N+RgXNnki40BsSNAeROgMYuRnGBboPJ9J9sdn2HsFNo7GSXUWUqswSp1rNLVCQrjTLKxGhA7rcXofI9J9sdX/J3tqnehehmMmMmYMMy+F5bXck8CozBGQ4HXPW/RtRY/KftOWaN0QhlKoq4WFrGwVwRqtrd99c447TvcRrfyh7dppqLLp2Rh0h8jSWkvqqoGljlbUWGWoMZClGUQpYEJHhHopCJz15f7R/hMGjVzPPbjxPOAswdeX+0f4TBX+ftjm6j2jq6b0x61czLrtpzPKESqmee2vP5xiNOHd/tEKo9v8AuMaLZ0hTf3ddy46FWON2mP1XYBiApsVU62vYxmn3ZqT/AHbfQnf9OPowyo98Fvwjqr7nFt9j5w/NWo+Tf6E3/pwn5q1Hyb/Qm/8ATj6ONL2Q1qSFPkbLg4TK3TmznJZJigKgBwakIoOTWNsoJJu7MpOuqzZgIsQqi4tneOxNTWiEy4a+KGz22OQnaEz9Wqfqm90Sy6hmF2lzJfLpBhJ52Gv/AJjqrShGS37S3Q2/4n+yJjxRjK0XJllKNMzWPthrsDxiPFCFo6jmLGz94K2QnRy/gxUXzaXMJa/FrTACchwytD03rrwSwFLdtfi5ttSbW6XIXMUrwwxKKFDvntH/APl1v/VzNbWv/W8gBDfz12haxFKR1f7qZeyeRY9JlbhygUY9gvxA7/8AxEpCwnO31r2sClIQL2BlObYvKz6TjEC721o0WlHK0uZl/wDZ227oomWPOX1+6I5i24jPleFIvxQTmb51xGEpSFbAYTKmFbDQWMy1hwHCKu2N56uplvLmpSkOLEiU4YW0ZTjyYag2yimYjaFEK0iThWxjp+4EhZEhJjUpZ5ob41UaYTLfCyXsOqmgIHFc+3mzR3Pc3/8AH0v+BL/hEGDmn5Qd3MUsT5FNg6PG00qmDEmbmYwsLkeNgYw8gjCLR37fL+wVn+VqP9J4+dZM0ju5RiZBINHrwwQ6MiGi3MoEnPMVxcYB/EI0/wCZ9L5n/M/vgH+Tj+um/wCGP4hHRElRhL2ZIzA3NpfMP0n98O/Mql80/Sb3xpxJMPEmMSh9EiyEhqLEwEAQOkLgiQiHAQBTqUygewgtULlATbFbLp5RmzDZQQBbUk8FHE8fRAFLaW1pMiZKlzGs00gKOVzZS3IFsh7ozn5Q8ug/9z/ZHPN55szpMRms5BymEklreQ9zzFj4Rt98K3pqein6dJLZ7ciyyiw9BuPRGUV5MX6M1ePXiLFCrmY2NmNWSXht4sCl5t7PfD3oBYHFrcjTgbc+wxo7nHyb+2ycFJiIo108ggAE6aAmDHwIecfAe+KtRssE3xkege+I+px8lXTZOASJrea3gYkRySLg8dQRwMX/AOi/+IfAe+FXZguDjJ14L74xXUY+S9tk4KphhgkaFfOP/L74YaFfOPq98Zd1j5J22TgHNHcdzT/6fS/4Ev8Ahjjp2evnnwHvjoe6u8apKkUzJYKqSw+IcOqCVtl4w7jG/FkfT5F5oN74/wBgrP8AK1H+k8fOax9F74/2Cs/ytR/pPHzmpjaakFE4QQn7LdZfSZEAgMBe6YvJY/NJ6t+BsDqt6lAOspte3Wt3ZxdcvNmrKVyvVOI3NsNhiBtqCcIt3RQHfyc/103/AAx/EI6dTLlGC3O2Q0icxvilvKBVwLXKsMaMLnC6ki4uRYqQSDHQaQXEYS9lQ9UhxSJFlGHhIhQmsSCGiHWi0BphwMNMIzWBPAAnwgBlQ4AuSABxNgB6THD/AMo1fUmbMlTXxCXMYKAAAEezpaw80pfug3v5vwk+WJUgsEIDEsLF/NtY+SMjnxOmUZfa0/4RSSZxzcS3kPx61MwMsntMuan0YEATzS8mx8pSq/YvguEeiOm7s7FmTtn0wmS5DqiuUxTJqsAzsTcKtuA48I5VSVZUOFEvMp1plsK2xHIHK5yz4WPOOlbt7ZBp5YwN1UClpU9+juoscKLOFh2AARQEavd6XKUzJlNKwLbEUnzSQpIBIVkANr314RHvBsank4RLQB8yTcmyjLiTqfYYEbQ3nmhnQdaWVZGSaZk0G4VlPWc2NrjI2OLMaWJV9U80Y5gGNlAIW4UWGgBJy9Mc/U5KhXJv6aFzt/BUTZFRgEwynCEAqxsFIIuLE9kVa9xLCq5wtbQsuhJIg7VbWqZiKrzLgHqrglgCwtph5QD2pQrMmmY4xNhVeAACiwAC2Ecf9NLw2dqeRvykVPh6Wvdj2C32iLUpSRizHh7ok+BhVFgB3ARYVOqIwdGwCzqshiLadv8AKFkVBa+Vrdo90H93dh0dR0hqKkynE0qqh5alhYZ2dSTmSMuUQbW2GKZ1UEnHLYkFgxBV7DRVyKleGuLgBHZkxwUPXk4seWbyU34B4Q5ZnPu90ROpBtn4/wAoIrLy9MNqZWd+YjiO0oTEsRr4xZcWFuznEsyVcX5RJguumkAaGp20s6hmiYPKkTUc3/4bBjbuz9MYyk3LQgMQmYBscZtfOxsRE9fWvJlsFVGDZNjBYWYFTYXA1IBveAA3pnFiZhl2yyIm2sMgFWXMAGhOfb3R6mKe0Uzy8sNZNBfbGw/g8sTFCDrBeqrA2IPEscvRALYsyzM9vKKqDw85s/DwixtDeBHl4SkoE26yrMJFjf8ATcgQPp660sqDkQM7BbnTFYZA25RtNRot09oMatnZ36FR1kBJUl+qpKaEqBfIXyy1jrskZCxBFgQRmCDmCCNQRHFd2Z6qhHFmZ27ALAepb+mNX+Tnb1TOnzJbOvweWosGCgpMmuSiI2pvZ8jfstEKdGBj14daPWiFCgELaHQkUhGYy2+m9gowFl4WmmxIOir2jmeXLPlBHfKtnSaSZNkEYkwkkgHDLxATGAOWSknuBjhe2tqzZkyY01sT635g2Hqt7IgH70y1DF5eUskTE7JU9RMRf3Q+D9wwP2VU4Zc2XMa0sWmkgXKtbowqrcYmbEo1A6t8gCYelUJtNh/Slh0/cDdInrmzB3KIG7Ml4i7HSygk+SMRuAeGeE2HZFAX3fp6NkdjPdLEAiZKZicsiOiDDnrBFqdCjGTUYgATbAygkDQBgM4G0k2VLBF0GLI4bpfv6+cW9n1svpJaqBhZwrWN/KIzv3A+MCF/Y+xkeYSZjPhaW+cvCCUDYTfGeL6W/R9A0lTm1uWX4/HCKm6dO604eYArt1iM8lGSDPM5C/70XkW7X9Pp4R5nUT2n+D0sENYfk8E61uUVSvWJ5mLaiwJ5+yK0pc840m49UcBE3R5AQjLcxPMHsEQA7dCnpnqj8JzQK7AG9iysD1rDMWvcGw58ot7a21LqJtklhAt8NreTZRbQW0GXb2Zg9mzrMwzswzHOxxC/POJaYgzgBp0f+0t4x6GaN+/hHBi8NPll2UOrC1CZA/jKHS11HYIV16gjhO8gYAowsTkRlkT3HgbcY0FLsJ8C2qqBuquZo5Nzpmw+E5kjugBIHDsiRBY3jbjy6X4NWTFv8jd4dimUqS2my54mCcHMtVTCCSQMKzHAAD2GeiRzet2YJYVSWOGyk2AuQzd+uKOpVMgqWUjMEgj2/jsjE73Uj9JLZR1GuHAANmQXU+kC37sb8GW5tVVmnNj/AEJ8AuRRLkRLcA6Xe9x3XES1tMq2stzYE4mwcdALnhxgPIlzS1lsMIBuxC6ADU9sXzTPMN3ZGbLR76dwjsOMIzKlOiFgAyjADxK2Ottch64PbqIqUqg6zWeaRzz6NP8AlTEP2zGQemYHDiQsTYKGFy3IDiezWDezQ6LKcm8sKgJH6OFBdT6Ba/GBDqGyd75BKyJ80LPxBFuD8bcDBdrYRMztYm5yPGNA1SBHGdxqE1W0cbLiEoGceQmFh0Y8SSP2I67RlZmLC4OElWtnZhw/GsQppYr1tSspGmMbBQSe4RZEcY/KZtCqWpnyjMbCMEyWoPV6Jh1eqMr40mDPPKKQg2zvaXqhOmE9Dcy2l8pD9SYLcSVJJ7e4RkNuUpRwjHNS0p25lGKlvSVv6YqbSq8QB4Ee3URPtOq6WQJhvi+LBvqWVEUn04cX70RFZBRVqoZoSWHOEBFOaXJGJmzF8r5cSRfIWJrdnaFShmAy1lqwGYvKU4b2xYJgxa5DPUwH2LsiZNSa4lPMlhlRiiswDZtY4cx3wRoaIyiRLp5mK2nRTHNuGRBtprFIFaLbE7pDe3K63uQL2ALE8zrzgnQbYq5kyWBMHVaYpOFL4QxU6DWyj0wBqaarZP7NOAxIQTJdRiDrgFyBmWsB3xot3tnTVmzZk1WS6ygqMMJUtKlvNy/bYj90xqyz0g2bMUN5JBarYgAc9YYuS98Ixu2fblEjDMDlHlHqkdTkoEMkAQ6qOfd9n4MLJTKKCHVvTb7IsmQ7EhFZja9lBY2GWgiCSOt6YObB2slNMeY4JGAjIX4g/ZGUEnJJmM3UW0BqHcyqVUnOFClcWElw4y8llwdVocd1p2JpylAiyy5GJsQXCRl1bE5dkaeb+UmmzyfwHb290Vdp7908+nmyU6QTJkt0XIAYmUqtzfIZx6co3bPMhKqX3MvTnM+mPGegBBYeMUNm7PsfjCGOXE5a3gjIplB8keEeY6PUTsopWoDrC1FWp05RM8sX0ESTJQKHLOFoBbeQfHvb5n8Ck+2M7tGmxqRqdR+0NPHT0wa3k2hLWcGKswmS5bghgBmuG1ipzy58YuV2716Q1EmaxPRCaqlRmAMRGutr+mN/0p7bI51lhWr/AAcZaoQuWBuLqpFiDdzpmPmnwizKrqcNliPaT9lofVUK4nexuzrN5AEYr8ObExVk7LkG/WmKQAbXByN7fo9hjvi7VnDJU6JJ01GN+iOt79Jx56RZSuOBlv5Vr9udz9sQ0uzZJNg81uzEoHjhj1V0Ck5uoxAZDpAvDiQSPXFMTbfk6mCRRVNQR1pszArcQqAKLdzO59EGNl7T6J+lQXFrOnB0zy7xqD2dsZGlaYtBLp1sWWfOZgpviU2ZGQ/pKVm3iGZXkU7C+bEL+6Llvd6YFOo7974tT/FSW+MyLMADgGoyOpMAN/HFVS0dev6YaRMtoGILD0B5bgf4kYXa9cxLEm5fMk9v4vB/dCuE3ZW0KVjnJwVUvsCspYDsBQfTMRMMwyBVLFhfAcgdDf3RJRV80SikleuZhJcqHITCoCqGBAJIJJ1yAyzvFtiWelYDvh9NQr0a9KpwsWK3BAYXwkg8c1I9BigLbIatuelLAWybBYg8gFWx9NhFynrqtW6zsBe2bYb8hkbwGpxTyjiVVB5k3y9MTTq/FLdUAAIIuqZA6rcgc7QJYZmNPmlkxsT0qjNyTmEcDMk2u3qjay5fRywCxNlAxE3JsLExl93pDzKhZzdWWJEs4SLXnOXljXsQtbtXnGnqqhPOXLXMZd8ef1U7lqvg7umjS25OibB2WsuRLVkXFbExIBOJs7E9l7eiL/wVPMX6I90cmn7TnBSWq5w0zxgDrEgAWz+y3ph5nzwL/C59yeM027raeiNi6iCVUYPBNu7L2/dXeuWQgAWXIxNYAXeYxsDYcAoP70D2aymKMu2NpjzMbuQGdnuTYCw5acBF6ewAN7AcybW8Y5cstpWjqxx1jQ2kXPuhu0B8W5+afZEsh0GrAXAtcjO+luekQbVcCU1yBl3coxgv1Is3+lmu3J2lSy6KUsydIVx0l1d0VheY5FwTfQiM3vBUKy26ZJhO0JjphmpMKyHVQgGFjhS4OWUY8sOYh1O4xKbiwYXN8siI9eStM8qL8h6WbNFgeVFVpy5tcAYyLkjMg2y8IsTjZgc8zbh38Y8ij1rIqhLNCyzcWhKlsROEgnLiOIyvDJLi9ri9rgXzt3QAqTZmSl7quQDS5L2HIF0JAgl/SdUBgWpcLYjCFkgWPYE7YEpPVgGHELcXFxe1r8tYuh1NgGGIai4vy078oy3mvlmOkH8Iz23aULJLAEiWCbDXAPK9Wf7sYoVssLj6wxMy6A5Iqnn8+OnzGU30YaG1jrkQYwe0N3paKUxD4suy3cA2axHVvdsgBHX0s7Tizl6mPlSF2fVyZTHFNUnlZsj3qDFWbIkt1umGt8lfnfzYMSt06R82qEW5JNqiUMz2G8EKHcaiYEfCmdwxsqTZRDS8KkNdUyIOIEX5EcY6zlM5s2oWW10cnPU3yyAsMhwh28FUGJIFri9h5x8r2Dxg7vbsWVIlyBTrkGcMAcTG+E4mOp0I8IykxLzURuM2WCDyZkUwIQzZpwgHUdX3CL+7815U15diXqJT02EW/v8ADa/7wXutEE0YJrEi9usO/h7Yq0jM05SLXvcXzGQJiFL+16+mWa4CdLYkdIHKq9tQot5N72a+YAOV4M7G3nmiR0UsYZSLNUKxRgomsrsox5nMQCGzFdizA68LD1FhBGlo5aAgOwB1Fxn6zFIFF3pmPML4mQl1YlQosVQoCMNrZHQRDO2rUlGQzZmG3REYmthVslHNeOfOKktJMsrbPESLnOxsSAbAa2POC1EVaraRLUkWSexIFgJkqXMGf76j0mMZOlbMoq3SD1FLnYF6Ul2aZKmszNdhbBdTfMkBbRItMbp1RkXv+97dYuoHtmB6oS7+b7PfHlSyNuz0440lQO+COFtlcJIGuplOWI9kOqJT3sBl0mO9+BBytzuYIEv5ohpLeaIm7LogQKF7ILaS8JAwjM2v5QItlFmrksQgW/VYHUXYBbXuwte54jhF3Gw/REJ0reaIbsuiB8ulOCYMObSmQXIPWYudQBYdYafZC7Vls6rZb2bmNLWv64ul25CLmzdnTp5IlqDhAJuQLX01jKMpbJpeTGUI6uzFf0XNsAE4Ny46QibOnXvgORBtdc7Ax0T81qzzE+ksIN1qzzZf0ljq+tm/b/s5fpYv3GRm0bk3A1MzIFcg7YhqDw1i21MbJYk2K3BNwAAQbRpPzXrPNT6QgPULMR2lsBiU2YAg2PoMc0lNe0dMdX6YNFE1peVrS8Jsbda6H7DDVpHDHqggtiDE5jK3jwghLaYxwquInQAXPgM4WcZiGzoVPIix8DGOzMtUCzQPhVQBcIq8NQyk+wxLLpXH6I8uY3DRg4HtXwi38IblHvhDchDZjVFKmp3BJKnyVXVeBN9AABnATb2z2sHw+cCb6hiSpt6SPCNR07chEFahmIyGwxAi9sweB9BsYzhkcZWYTx7RowAmkMgHaT3Lx8SItUAeZMC3GZv5IOfhnAmXWTVFTjsGRVQ5DJjPl31HJGieh24stVcqS5LWIOHIHW/8uEemeaE94pUyS4UgA2vbAqk+s+2Ay7QLF0mm8uwZGVVxypgF0YZZgkYWUnQ31Ai3U7xy5rYpkq50viS/p+Lzis9fJ/Rkgk5W6pJ5DyO2KQl21LvMFuN/C14K/k02DKra0yXLYFkzXxA2OIYUUr3Fwc+WloZt6npJLhKhpxmqOustFZZdxkhYzUJe1sQsQCbagxT2XVbPWarSjVK+gbCqWvket8KyEAdKqPySvcla3q/Ok5+kh4qSfyWPYGbXohIBKhFNjxGIuL99oz9dNpz5dZUN+87Adh+MYQOqKGQqdLJYTBjVGviDKXDFCQ6C4OAi4JzhYo1Nd+T2QjyE+H4g8w42+LBUJLduqATYnTOCI2ClPNYymL3lyJZckXIkywi6Zaa+jlGB6As6LpcgaaXIF/XHQ5ZRQFUWCgADPIDIcI5OqnUdeTq6WFy24HGW/wCCIQy3/Bj3SDkfGEM0cvXHAd55pb/gwmB/wY90q8j4whnLyPiYAUS2/BhhlN+DHumHmnxMN6Yeb7YAXom5+uNDultORTdK1RNSXiwBbnW2K/tEZ3pBy9sMYodR6jGeOekrMMkd40dFO+FB+sy/E+6E/PKg/WZfr90c5wp5ohMKebHT3b4OftVydG/PKg/WZfiY51XVCzq2qmSmxS2dCrZgGyANa/zgYTqebDukA0X1xryZ3NVRnjwKDtMM7t1lPTzOkns6kZKQGZLEEG4QE37xaGb37apZxHweZMmzriwCTBLCk9bE7qFGWljfTKBHS/NiMEeafX7oxWWo60ZPHctrPJLmWuSAeQIML0Tc/XHgfm+2HX+b+PCNZtEEk8/XDTKP4MOBPmj8eiFxHzfx4RABK/Z8tHZ2CjpMJYkjNkvrfsIirszZ9CwYTChAmPbFbQnFrbS5MX95sPQEvYWKlTxLXtYc8iYzElRc5+q8elgltD8HnZ46z/JqJOyNlXGVOewsg9RMGaCgoZZxSpdOp4MoS47iM4xMtpCylmTJbOzmZhAKjqo5l4mLBsyytkF0XXOL1CZTLdJDj94EeMumJ9UbjSYvbrFph1N2JJ1JJNySed/bEOzUIdTpY6kFh4AxsJ+yqqUSrUs9Tx+LYjxAsYgSlqP0aaf6JMz7sUlkdaTMIu9+20weok+2L1DIUU9QtzcCRMPVIFpdRLBz4mzt4wkvY9e3k0dQe9Cv8VoI0e7leJdSJlLMVWppwFypuwwugsGvclBChYHO0acMrl8g6FsiSEDAsbccr5R0es2ZUAB5adKhAKvLHSBgdDkPbHK9jbBmTqkU7ynUocc5XUqUlIbvivoGAwg8SwjurVjq5EqmnGwHXBly1OuXWcNl3Rqy4Vk9m3HmeMws+fUr/dN6ZZ+0RCa+q4Sz9D+UdF+F1Z1ZJQ7XeafABQPEwxqpx5dU57FIQerP1xq7Rcm3u3wc8NdV/JN9X/2x74bV/JP9X/2xW373nq0qitPVz0QImQmNa+dzrGUmb57SH/71T9Y0O1XI7p8Gz+GVfyT/AFf/AGx41dZ8lM+rP3YE7P3prjLUmrqCSMz0r8z2xOd5a39an/Wv74dquR3T4LrTqz5J/qj92E6Ss+RmfVH7sUjvJW/rc/61/fDTvJW/rVR9a/vi9rEd0+C8Ztb8jM+qP3YUTa75Gb9UfuxQO367Dj+E1GEEKW6V8mIJA8q+gMRy9vVzBsNTUHCCzfHPkoIBObdoh2sR3T4CRmV/yM36k/chDMr/AJGd9S33IGfnDWfrVR9dM+9CHb9Z+tVH10z70O1iO5fAUx7Q+RnfUt9yPX2h8jO+pb7kCTt6r/Wqj66Z96Km09v1glsRVVAOE6TpnMfOh20R3L4ND/6h8jO+pb7kJh2j8jP+pb7kc8G8ld+uVX/yJv3oJbE2/WFzerqT1TrPmniObQ7aI7l8GwKbR+Rn/Uv92ImpNqPkJU8f+2U9ZAiiNr1P6zP+tmfeivOnzXyadNbvmO3tMVdPEj6hv4E3g2LNSU71MwCZhOCVjEyazfOAJCqNSSeFgM4CUm01CqTfEOzWDFIsyXiwFSpGaOiOpI42YZHtgBP2VNDlES66q3DDyJ5jTnG6MVFUjTKTk7YW2nOlqlOmf9nVr2+VmTZuf04tbH3gkykKMmK/HCpPgwI9UJtXdqe7rhaWAsmmQA4v0KeUDoOd4pndCs4dCe5z9qxTE+mxfthCDyMCpk5ptSUViJUgWexIxzmF8NxwVfW0XDJHNvpP74yITlDyPhFOtayPzwP4hTCtKHNvpN74hmyxa2eeXlMdctLwIDNv7TCypgAuCjAm4sLggZ/ZGVqt8pxyVQIBb1TxNYAliAAbF3IvqMr2gSrGBQzUbbnuc3I7sooT6lzqzH0mIkj00xAAdpnr+gQNnyrxf2iev6BFUxQE9mj4te77TFmIKLyF7vtMTGBDxMIY8TDSYELy/wBkf/MSv9OZDNkeTUf5eZ/qS4p4ja1zbW3C/O0NRiL2JzuD2i+h7IFPCFht49eBT14qbU/q2/ZPtEWrxT2qfi2/ZPtEQGcBgnsI/GH9n7RAsGCWxD1z+yfaIA0yQ+9ohlmHPpApKZuR0EEKOUryxMSdIIK3t0qqwy8kq1jeAEx4dSKCyqAM2UaczaAN9VU3xr/HU69YizTkBGHKxBORy0iWXIX9Ypvr0jG189WnzWsM5sw+LsYnp8PmiAs7hsih6GUqE3bNnbzpjHE7eJ8LRZYQpnjzH8V98MM75j+Ke+KQYwgdtCaVKWBPWU+sReZm83+H70VqqfMUHDJLtbqi8tFvwuS9x6AYEOUbQ2TP6R/i3sGIBsdAbCIBsef8k/gY6oj1bf3UhO+Yz+pUHth4o558qeo7JcsL63LQBzFNjT7f1b+EVKmjZciDflrHXBs1f0md/wBpsvAWjy0MsaIPD3xKLZ8+7YQrNIIsbA2OWRiliHOPoudQyybmVLJ5lFJ8SIhNBK+Rl/QX3RaJZxKkXqL3faYcTB3ekKtXOAAAutgBYDqjgIBzSPwDADCYaTEUycB/4MV3qhAFstDVb2n2xSNWIYKv7fbAoQxR7FA/4WIT4X3+uACGKKe1G+Lb9k+0RH8K7/Aw1p2LLmD9kAAQYJ7CzmH9n7RBGTTQRpqcCJRSeTLiRpV4lkS4siVAAZ5MSUMm01D89faIJPTRC9I3A2PA8jAhS6O5vF2mWL8mtm2HSS6dyABiMlbm3Pme2LMnaTjSRTemSpgU7XhENYQ+GERSEdoQrD4QwIRkQloeRCAQBGRCERIQIaRAETQzAIlIhLRSGS2ruYk6c84zXBcgkALYWAH2QPnfk/l2/rn8FjdFYYVECnLNo7jKuk1z6F90Zis3aKnymI7hHc5tKp4RQnbEltwiA4edifOPqhp2L85vAR2Z92ZR4Qh3Vk8oCzjX9DDzm9Ue/oUec3q90djO60rzRDTuxK5CAs4+NiDzm9XuiWVsQAg4my7vdHXBu1K5Qv5ty+UBZzNKUDhFlJEdD/NyVyh67vy+UBZgElxYWXG5/oGXyh42HL5QKYQyoUSo3Y2HL5Qv9CS+QgDCiWOUSypI5Rtf6Gl8hCjZKcoA2BhpELCEQA20IRCwloEEIhI9HsMAMYw1SIkIhmGAGmEh5WGlYAYRCWhxWEwwA20Nww4x7DAgwrDYeY9gEUEDwosYltDMEQDLR60SFYTDADMMetDsMewwKNwx60eIhQsAIRCQ4iPBBAERNuEPEPIEMCQB/9k=" class="card-img-top" alt="Câble">
                            <div class="card-body">
                                <h5 class="card-title"> salle de reunion - </h5>
                                <p class="card-text">on un seule salle de reunion : </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
