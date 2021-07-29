<?php

function mcrypt1($string){
    openssl_public_encrypt($string,$crypted,'-----BEGIN PUBLIC KEY-----
    MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA21r96JWO/S3J3SzpiyGI3EuCijfxs+acsfzzihKZHssXfhemX7iC3uQ9EsPTBifH/oG9uhNDlQz/JfuCRYLZWm2LWs6SgQEqZcdm7Ga0CUQr2N7Ik7SLN3gqSMn2/Ow9z3mnNYBj4+eNNMKFS13/3/L+a/nOTy7BCCRtP5ATnhI0LKUEKcQgpp8CEMh4ueAOYacP2UCawXc31Lx1kCJQ3/dXospKLjbnvKTqJdDB4ULKQIKSs5NdDOtDYKNE8gzL4P8CkFerOevWlLXNTqSbmnqxs7FemcaAVgv+tQGVXFlsrl60Ei/rAqbtYITpHYWuaj8LGmaw6Od/Y0JYGe8sbwIDAQAB
-----END PUBLIC KEY-----');
    return urlencode(base64_encode($crypted));
}
var_dump(mcrypt1('6456'));
