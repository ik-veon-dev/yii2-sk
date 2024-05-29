<?php

namespace api\modules\v1\interfaces\gql;

interface RemoveInterface
{
    public function removeFile($attachmentId) : bool;
}
