<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Face Recognition</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        canvas{
            position: absolute;
        }
    </style>
</head>
<body>
    <video id="videoInput" width="720" height="550" muted controls>

    <script src="{{ asset('/face_recognition/js/face-api.min.js') }}"></script>
    <script>
        const video = document.getElementById('videoInput')

        Promise.all([
            faceapi.nets.faceRecognitionNet.loadFromUri('face_recognition/models'),
            faceapi.nets.faceLandmark68Net.loadFromUri('face_recognition/models'),
            faceapi.nets.ssdMobilenetv1.loadFromUri('face_recognition/models') //heavier/accurate version of tiny face detector
        ]).then(start)

        function start() {
            document.body.append('Models Loaded')
            
            navigator.getUserMedia(
                { video:{} },
                stream => video.srcObject = stream,
                err => console.error(err)
            )
            
            //video.src = '../videos/speech.mp4'
            console.log('video added')
            recognizeFaces()
        }

        async function recognizeFaces() {

            const labeledDescriptors = await loadLabeledImages()
            console.log(labeledDescriptors)
            const faceMatcher = new faceapi.FaceMatcher(labeledDescriptors, 0.7)


            video.addEventListener('play', async () => {
                console.log('Playing')
                const canvas = faceapi.createCanvasFromMedia(video)
                document.body.append(canvas)

                const displaySize = { width: video.width, height: video.height }
                faceapi.matchDimensions(canvas, displaySize)

                

                setInterval(async () => {
                    const detections = await faceapi.detectAllFaces(video).withFaceLandmarks().withFaceDescriptors()

                    const resizedDetections = faceapi.resizeResults(detections, displaySize)

                    canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height)

                    const results = resizedDetections.map((d) => {
                        return faceMatcher.findBestMatch(d.descriptor)
                    })
                    results.forEach( (result, i) => {
                        const box = resizedDetections[i].detection.box
                        const drawBox = new faceapi.draw.DrawBox(box, { label: result.toString() })
                        drawBox.draw(canvas)
                    })
                }, 100)


                
            })
        }


        function loadLabeledImages() {
            const labels = ['Black Widow', 'Captain America', 'Hawkeye' , 'Jim Rhodes', 'Tony Stark', 'Thor', 'Captain Marvel','Prashant Kumar','Paul']
        
            return Promise.all(
                labels.map(async (label)=>{
                    const descriptions = []
                    for(let i=1; i<=2; i++) {
                        const img = await faceapi.fetchImage(`face_recognition/labeled_images/${label}/${i}.jpg`)
                        const detections = await faceapi.detectSingleFace(img).withFaceLandmarks().withFaceDescriptor()
                        console.log(label + i + JSON.stringify(detections))
                        descriptions.push(detections.descriptor)
                    }
                    document.body.append(label+' Faces Loaded | ')
                    return new faceapi.LabeledFaceDescriptors(label, descriptions)
                })
            )
        }
    </script>
</body>
</html>