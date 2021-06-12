<script src="../assets/js/three.js"></script>
<script src="../assets/js/OrbitControls.js"></script>
<script>
    /* Create the game scene */
    const scene = new THREE.Scene();

    const renderer = new THREE.WebGLRenderer();
    renderer.setSize( window.innerWidth, window.innerHeight );
    document.body.appendChild( renderer.domElement );

    /* Camera */
    const camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 0.1, 1000 );


    /* Manage texture */
    const floor_texture = new THREE.TextureLoader();
    const tube_texture = new THREE.TextureLoader();
    const ball_texture = new THREE.TextureLoader();


    /* Create Object */

    //Floor
    const floor_geometry = new THREE.PlaneGeometry( 100, 100, 10 );
    const floor_material = new THREE.MeshPhongMaterial( {color: 0xFFA500, wireframe: false} );
    const floor = new THREE.Mesh( floor_geometry, floor_material );

    //Tube
    const tube_geometry = new THREE.CylinderGeometry( 8, 8, 8, 100, 1, 0);
    const tube_material = new THREE.MeshPhongMaterial( {color: 0xfffff, wireframe: true} );

    const tube_1 = new THREE.Mesh( tube_geometry, tube_material );
    const tube_2 = new THREE.Mesh( tube_geometry, tube_material );
    const tube_3 = new THREE.Mesh( tube_geometry, tube_material );
    const tube_4 = new THREE.Mesh( tube_geometry, tube_material );
    const tube_5 = new THREE.Mesh( tube_geometry, tube_material );
    const tube_6 = new THREE.Mesh( tube_geometry, tube_material );
    const tube_7 = new THREE.Mesh( tube_geometry, tube_material );
    const tube_8 = new THREE.Mesh( tube_geometry, tube_material );
    const tube_9 = new THREE.Mesh( tube_geometry, tube_material );

    //Sphere
    const sphere_geometry = new THREE.SphereGeometry( 8, 32, 32, 0, 3.2 );
    const sphere_material = new THREE.MeshPhongMaterial( {color: 0xffffff, wireframe: true} );


    const sphere_1 = new THREE.Mesh( sphere_geometry, sphere_material );
    const sphere_2 = new THREE.Mesh( sphere_geometry, sphere_material );
    const sphere_3 = new THREE.Mesh( sphere_geometry, sphere_material );
    const sphere_4 = new THREE.Mesh( sphere_geometry, sphere_material );
    const sphere_5 = new THREE.Mesh( sphere_geometry, sphere_material );
    const sphere_6 = new THREE.Mesh( sphere_geometry, sphere_material );
    const sphere_7 = new THREE.Mesh( sphere_geometry, sphere_material );
    const sphere_8 = new THREE.Mesh( sphere_geometry, sphere_material );
    const sphere_9 = new THREE.Mesh( sphere_geometry, sphere_material );

    //Disc
    const disc_geometry = new THREE.CircleGeometry( 8, 32 );
    const disc_material = new THREE.MeshPhongMaterial( { color: 0x000000 } );

    const disc_1 = new THREE.Mesh( disc_geometry, disc_material );
    const disc_2 = new THREE.Mesh( disc_geometry, disc_material );
    const disc_3 = new THREE.Mesh( disc_geometry, disc_material );
    const disc_4 = new THREE.Mesh( disc_geometry, disc_material );
    const disc_5 = new THREE.Mesh( disc_geometry, disc_material );
    const disc_6 = new THREE.Mesh( disc_geometry, disc_material );
    const disc_7 = new THREE.Mesh( disc_geometry, disc_material );
    const disc_8 = new THREE.Mesh( disc_geometry, disc_material );
    const disc_9 = new THREE.Mesh( disc_geometry, disc_material );

    //======================== Initialisation =====================
    function init()
    {
        /* manage Object */
        floor.position.set(0,0,0);

        tube_1.position.set(-30,30,-2);
        tube_1.rotation.set(1.55,0,0);

        tube_2.position.set(0,30,-2);
        tube_2.rotation.set(1.55,0,0);

        tube_3.position.set(30,30,-2);
        tube_3.rotation.set(1.55,0,0);

        tube_4.position.set(-30,0,-2);
        tube_4.rotation.set(1.55,0,0);

        tube_5.position.set(0,0,-2);
        tube_5.rotation.set(1.55,0,0);

        tube_6.position.set(30,0,-2);
        tube_6.rotation.set(1.55,0,0);

        tube_7.position.set(-30,-30,-2);
        tube_7.rotation.set(1.55,0,0);

        tube_8.position.set(0,-30,-2);
        tube_8.rotation.set(1.55,0,0);

        tube_9.position.set(30,-30,-2);
        tube_9.rotation.set(1.55,0,0);


        disc_1.position.set(-30,30,0.1);
        disc_2.position.set(0,30,0.1);
        disc_3.position.set(30,30,0.1);
        disc_4.position.set(-30,0,0.1);
        disc_5.position.set(0,0,0.1);
        disc_6.position.set(30,0,0.1);
        disc_7.position.set(-30,-30,0.1);
        disc_8.position.set(0,-30,0.1);
        disc_9.position.set(30,-30,0.1);


        /* manage Camera */
        camera.position.set(0,-60,40);
        camera.rotation.set(0.8,0,0);

        /* animation */
        scene.add( floor );

        scene.add( tube_1 );
        scene.add( tube_2 );
        scene.add( tube_3 );
        scene.add( tube_4 );
        scene.add( tube_5 );
        scene.add( tube_6 );
        scene.add( tube_7 );
        scene.add( tube_8 );
        scene.add( tube_9 );

        scene.add( disc_1 );
        scene.add( disc_2 );
        scene.add( disc_3 );
        scene.add( disc_4 );
        scene.add( disc_5 );
        scene.add( disc_6 );
        scene.add( disc_7 );
        scene.add( disc_8 );
        scene.add( disc_9 );

        /* game */
        const rndnbs = Math.floor(Math.random() * 9) + 1

        switch (rndnbs)
        {
            case 1:
                sphere_1.position.set(-30,30,0);
                break;
            case 2:
                sphere_1.position.set(0,30,0);
                break;
            case 3:
                sphere_1.position.set(30,30,0);
                break;
            case 4:
                sphere_1.position.set(-30,0,0);
                break;
            case 5:
                sphere_1.position.set(0,0,0);
                break;
            case 6:
                sphere_1.position.set(30,0,0);
                break;
            case 7:
                sphere_1.position.set(-30,-30,0);
                break;
            case 8:
                sphere_1.position.set(0,-30,0);
                break;
            case 9:
                sphere_1.position.set(30,-30,0);
                break;
        }
        scene.add( sphere_1 );

        /* Light */
        var light = new THREE.HemisphereLight(0x404040, 0xFFFFFF, 1.3);
        scene.add(light);

        /* Control */
        controls = new THREE.OrbitControls (camera, renderer.domElement);
    }

    //======================== animation ======================
    const animate = function () {
        requestAnimationFrame( animate );

        renderer.render( scene, camera );
    };
    init();
    animate();

    /* ----------------- Mouse -----------------*/
    const mouse = new THREE.Vector2();

    function onMouseMove( event ){
        mouse.x = ( event.clientX / window.innerWidth ) * 2 - 1;
        mouse.y = - ( event.clientY / window.innerHeight ) * 2 + 1;
    }

</script>
