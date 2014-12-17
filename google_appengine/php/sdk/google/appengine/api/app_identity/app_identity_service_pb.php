<?php
/**
 * Copyright 2007 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
# Generated by the protocol buffer compiler. DO NOT EDIT!
# source: google/appengine/api/app_identity/app_identity_service.proto

namespace dummy {
  require_once 'google/appengine/runtime/proto/ProtocolMessage.php';
}
namespace google\appengine\AppIdentityServiceError {
  class ErrorCode {
    const SUCCESS = 0;
    const UNKNOWN_SCOPE = 9;
    const BLOB_TOO_LARGE = 1000;
    const DEADLINE_EXCEEDED = 1001;
    const NOT_A_VALID_APP = 1002;
    const UNKNOWN_ERROR = 1003;
    const GAIAMINT_NOT_INITIAILIZED = 1004;
    const NOT_ALLOWED = 1005;
    const NOT_IMPLEMENTED = 1006;
  }
}
namespace google\appengine {
  class AppIdentityServiceError extends \google\net\ProtocolMessage {
    public function clear() {
    }
    public function byteSizePartial() {
      $res = 0;
      return $res;
    }
    public function outputPartial($out) {
    }
    public function tryMerge($d) {
      while($d->avail() > 0) {
        $tt = $d->getVarInt32();
        switch ($tt) {
          case 0:
            throw new \google\net\ProtocolBufferDecodeError();
            break;
          default:
            $d->skipData($tt);
        }
      };
    }
    public function checkInitialized() {
      return null;
    }
    public function mergeFrom($x) {
      if ($x === $this) { throw new \IllegalArgumentException('Cannot copy message to itself'); }
    }
    public function equals($x) {
      if ($x === $this) { return true; }
      return true;
    }
    public function shortDebugString($prefix = "") {
      $res = '';
      return $res;
    }
  }
}
namespace google\appengine {
  class SignForAppRequest extends \google\net\ProtocolMessage {
    public function getBytesToSign() {
      if (!isset($this->bytes_to_sign)) {
        return '';
      }
      return $this->bytes_to_sign;
    }
    public function setBytesToSign($val) {
      $this->bytes_to_sign = $val;
      return $this;
    }
    public function clearBytesToSign() {
      unset($this->bytes_to_sign);
      return $this;
    }
    public function hasBytesToSign() {
      return isset($this->bytes_to_sign);
    }
    public function clear() {
      $this->clearBytesToSign();
    }
    public function byteSizePartial() {
      $res = 0;
      if (isset($this->bytes_to_sign)) {
        $res += 1;
        $res += $this->lengthString(strlen($this->bytes_to_sign));
      }
      return $res;
    }
    public function outputPartial($out) {
      if (isset($this->bytes_to_sign)) {
        $out->putVarInt32(10);
        $out->putPrefixedString($this->bytes_to_sign);
      }
    }
    public function tryMerge($d) {
      while($d->avail() > 0) {
        $tt = $d->getVarInt32();
        switch ($tt) {
          case 10:
            $length = $d->getVarInt32();
            $this->setBytesToSign(substr($d->buffer(), $d->pos(), $length));
            $d->skip($length);
            break;
          case 0:
            throw new \google\net\ProtocolBufferDecodeError();
            break;
          default:
            $d->skipData($tt);
        }
      };
    }
    public function checkInitialized() {
      return null;
    }
    public function mergeFrom($x) {
      if ($x === $this) { throw new \IllegalArgumentException('Cannot copy message to itself'); }
      if ($x->hasBytesToSign()) {
        $this->setBytesToSign($x->getBytesToSign());
      }
    }
    public function equals($x) {
      if ($x === $this) { return true; }
      if (isset($this->bytes_to_sign) !== isset($x->bytes_to_sign)) return false;
      if (isset($this->bytes_to_sign) && $this->bytes_to_sign !== $x->bytes_to_sign) return false;
      return true;
    }
    public function shortDebugString($prefix = "") {
      $res = '';
      if (isset($this->bytes_to_sign)) {
        $res .= $prefix . "bytes_to_sign: " . $this->debugFormatString($this->bytes_to_sign) . "\n";
      }
      return $res;
    }
  }
}
namespace google\appengine {
  class SignForAppResponse extends \google\net\ProtocolMessage {
    public function getKeyName() {
      if (!isset($this->key_name)) {
        return '';
      }
      return $this->key_name;
    }
    public function setKeyName($val) {
      $this->key_name = $val;
      return $this;
    }
    public function clearKeyName() {
      unset($this->key_name);
      return $this;
    }
    public function hasKeyName() {
      return isset($this->key_name);
    }
    public function getSignatureBytes() {
      if (!isset($this->signature_bytes)) {
        return '';
      }
      return $this->signature_bytes;
    }
    public function setSignatureBytes($val) {
      $this->signature_bytes = $val;
      return $this;
    }
    public function clearSignatureBytes() {
      unset($this->signature_bytes);
      return $this;
    }
    public function hasSignatureBytes() {
      return isset($this->signature_bytes);
    }
    public function clear() {
      $this->clearKeyName();
      $this->clearSignatureBytes();
    }
    public function byteSizePartial() {
      $res = 0;
      if (isset($this->key_name)) {
        $res += 1;
        $res += $this->lengthString(strlen($this->key_name));
      }
      if (isset($this->signature_bytes)) {
        $res += 1;
        $res += $this->lengthString(strlen($this->signature_bytes));
      }
      return $res;
    }
    public function outputPartial($out) {
      if (isset($this->key_name)) {
        $out->putVarInt32(10);
        $out->putPrefixedString($this->key_name);
      }
      if (isset($this->signature_bytes)) {
        $out->putVarInt32(18);
        $out->putPrefixedString($this->signature_bytes);
      }
    }
    public function tryMerge($d) {
      while($d->avail() > 0) {
        $tt = $d->getVarInt32();
        switch ($tt) {
          case 10:
            $length = $d->getVarInt32();
            $this->setKeyName(substr($d->buffer(), $d->pos(), $length));
            $d->skip($length);
            break;
          case 18:
            $length = $d->getVarInt32();
            $this->setSignatureBytes(substr($d->buffer(), $d->pos(), $length));
            $d->skip($length);
            break;
          case 0:
            throw new \google\net\ProtocolBufferDecodeError();
            break;
          default:
            $d->skipData($tt);
        }
      };
    }
    public function checkInitialized() {
      return null;
    }
    public function mergeFrom($x) {
      if ($x === $this) { throw new \IllegalArgumentException('Cannot copy message to itself'); }
      if ($x->hasKeyName()) {
        $this->setKeyName($x->getKeyName());
      }
      if ($x->hasSignatureBytes()) {
        $this->setSignatureBytes($x->getSignatureBytes());
      }
    }
    public function equals($x) {
      if ($x === $this) { return true; }
      if (isset($this->key_name) !== isset($x->key_name)) return false;
      if (isset($this->key_name) && $this->key_name !== $x->key_name) return false;
      if (isset($this->signature_bytes) !== isset($x->signature_bytes)) return false;
      if (isset($this->signature_bytes) && $this->signature_bytes !== $x->signature_bytes) return false;
      return true;
    }
    public function shortDebugString($prefix = "") {
      $res = '';
      if (isset($this->key_name)) {
        $res .= $prefix . "key_name: " . $this->debugFormatString($this->key_name) . "\n";
      }
      if (isset($this->signature_bytes)) {
        $res .= $prefix . "signature_bytes: " . $this->debugFormatString($this->signature_bytes) . "\n";
      }
      return $res;
    }
  }
}
namespace google\appengine {
  class GetPublicCertificateForAppRequest extends \google\net\ProtocolMessage {
    public function clear() {
    }
    public function byteSizePartial() {
      $res = 0;
      return $res;
    }
    public function outputPartial($out) {
    }
    public function tryMerge($d) {
      while($d->avail() > 0) {
        $tt = $d->getVarInt32();
        switch ($tt) {
          case 0:
            throw new \google\net\ProtocolBufferDecodeError();
            break;
          default:
            $d->skipData($tt);
        }
      };
    }
    public function checkInitialized() {
      return null;
    }
    public function mergeFrom($x) {
      if ($x === $this) { throw new \IllegalArgumentException('Cannot copy message to itself'); }
    }
    public function equals($x) {
      if ($x === $this) { return true; }
      return true;
    }
    public function shortDebugString($prefix = "") {
      $res = '';
      return $res;
    }
  }
}
namespace google\appengine {
  class PublicCertificate extends \google\net\ProtocolMessage {
    public function getKeyName() {
      if (!isset($this->key_name)) {
        return '';
      }
      return $this->key_name;
    }
    public function setKeyName($val) {
      $this->key_name = $val;
      return $this;
    }
    public function clearKeyName() {
      unset($this->key_name);
      return $this;
    }
    public function hasKeyName() {
      return isset($this->key_name);
    }
    public function getX509CertificatePem() {
      if (!isset($this->x509_certificate_pem)) {
        return '';
      }
      return $this->x509_certificate_pem;
    }
    public function setX509CertificatePem($val) {
      $this->x509_certificate_pem = $val;
      return $this;
    }
    public function clearX509CertificatePem() {
      unset($this->x509_certificate_pem);
      return $this;
    }
    public function hasX509CertificatePem() {
      return isset($this->x509_certificate_pem);
    }
    public function clear() {
      $this->clearKeyName();
      $this->clearX509CertificatePem();
    }
    public function byteSizePartial() {
      $res = 0;
      if (isset($this->key_name)) {
        $res += 1;
        $res += $this->lengthString(strlen($this->key_name));
      }
      if (isset($this->x509_certificate_pem)) {
        $res += 1;
        $res += $this->lengthString(strlen($this->x509_certificate_pem));
      }
      return $res;
    }
    public function outputPartial($out) {
      if (isset($this->key_name)) {
        $out->putVarInt32(10);
        $out->putPrefixedString($this->key_name);
      }
      if (isset($this->x509_certificate_pem)) {
        $out->putVarInt32(18);
        $out->putPrefixedString($this->x509_certificate_pem);
      }
    }
    public function tryMerge($d) {
      while($d->avail() > 0) {
        $tt = $d->getVarInt32();
        switch ($tt) {
          case 10:
            $length = $d->getVarInt32();
            $this->setKeyName(substr($d->buffer(), $d->pos(), $length));
            $d->skip($length);
            break;
          case 18:
            $length = $d->getVarInt32();
            $this->setX509CertificatePem(substr($d->buffer(), $d->pos(), $length));
            $d->skip($length);
            break;
          case 0:
            throw new \google\net\ProtocolBufferDecodeError();
            break;
          default:
            $d->skipData($tt);
        }
      };
    }
    public function checkInitialized() {
      return null;
    }
    public function mergeFrom($x) {
      if ($x === $this) { throw new \IllegalArgumentException('Cannot copy message to itself'); }
      if ($x->hasKeyName()) {
        $this->setKeyName($x->getKeyName());
      }
      if ($x->hasX509CertificatePem()) {
        $this->setX509CertificatePem($x->getX509CertificatePem());
      }
    }
    public function equals($x) {
      if ($x === $this) { return true; }
      if (isset($this->key_name) !== isset($x->key_name)) return false;
      if (isset($this->key_name) && $this->key_name !== $x->key_name) return false;
      if (isset($this->x509_certificate_pem) !== isset($x->x509_certificate_pem)) return false;
      if (isset($this->x509_certificate_pem) && $this->x509_certificate_pem !== $x->x509_certificate_pem) return false;
      return true;
    }
    public function shortDebugString($prefix = "") {
      $res = '';
      if (isset($this->key_name)) {
        $res .= $prefix . "key_name: " . $this->debugFormatString($this->key_name) . "\n";
      }
      if (isset($this->x509_certificate_pem)) {
        $res .= $prefix . "x509_certificate_pem: " . $this->debugFormatString($this->x509_certificate_pem) . "\n";
      }
      return $res;
    }
  }
}
namespace google\appengine {
  class GetPublicCertificateForAppResponse extends \google\net\ProtocolMessage {
    private $public_certificate_list = array();
    public function getPublicCertificateListSize() {
      return sizeof($this->public_certificate_list);
    }
    public function getPublicCertificateListList() {
      return $this->public_certificate_list;
    }
    public function mutablePublicCertificateList($idx) {
      if (!isset($this->public_certificate_list[$idx])) {
        $val = new \google\appengine\PublicCertificate();
        $this->public_certificate_list[$idx] = $val;
        return $val;
      }
      return $this->public_certificate_list[$idx];
    }
    public function getPublicCertificateList($idx) {
      if (isset($this->public_certificate_list[$idx])) {
        return $this->public_certificate_list[$idx];
      }
      if ($idx >= end(array_keys($this->public_certificate_list))) {
        throw new \OutOfRangeException('index out of range: ' + $idx);
      }
      return new \google\appengine\PublicCertificate();
    }
    public function addPublicCertificateList() {
      $val = new \google\appengine\PublicCertificate();
      $this->public_certificate_list[] = $val;
      return $val;
    }
    public function clearPublicCertificateList() {
      $this->public_certificate_list = array();
    }
    public function getMaxClientCacheTimeInSecond() {
      if (!isset($this->max_client_cache_time_in_second)) {
        return "0";
      }
      return $this->max_client_cache_time_in_second;
    }
    public function setMaxClientCacheTimeInSecond($val) {
      if (is_double($val)) {
        $this->max_client_cache_time_in_second = sprintf('%0.0F', $val);
      } else {
        $this->max_client_cache_time_in_second = $val;
      }
      return $this;
    }
    public function clearMaxClientCacheTimeInSecond() {
      unset($this->max_client_cache_time_in_second);
      return $this;
    }
    public function hasMaxClientCacheTimeInSecond() {
      return isset($this->max_client_cache_time_in_second);
    }
    public function clear() {
      $this->clearPublicCertificateList();
      $this->clearMaxClientCacheTimeInSecond();
    }
    public function byteSizePartial() {
      $res = 0;
      $this->checkProtoArray($this->public_certificate_list);
      $res += 1 * sizeof($this->public_certificate_list);
      foreach ($this->public_certificate_list as $value) {
        $res += $this->lengthString($value->byteSizePartial());
      }
      if (isset($this->max_client_cache_time_in_second)) {
        $res += 1;
        $res += $this->lengthVarInt64($this->max_client_cache_time_in_second);
      }
      return $res;
    }
    public function outputPartial($out) {
      $this->checkProtoArray($this->public_certificate_list);
      foreach ($this->public_certificate_list as $value) {
        $out->putVarInt32(10);
        $out->putVarInt32($value->byteSizePartial());
        $value->outputPartial($out);
      }
      if (isset($this->max_client_cache_time_in_second)) {
        $out->putVarInt32(16);
        $out->putVarInt64($this->max_client_cache_time_in_second);
      }
    }
    public function tryMerge($d) {
      while($d->avail() > 0) {
        $tt = $d->getVarInt32();
        switch ($tt) {
          case 10:
            $length = $d->getVarInt32();
            $tmp = new \google\net\Decoder($d->buffer(), $d->pos(), $d->pos() + $length);
            $d->skip($length);
            $this->addPublicCertificateList()->tryMerge($tmp);
            break;
          case 16:
            $this->setMaxClientCacheTimeInSecond($d->getVarInt64());
            break;
          case 0:
            throw new \google\net\ProtocolBufferDecodeError();
            break;
          default:
            $d->skipData($tt);
        }
      };
    }
    public function checkInitialized() {
      foreach ($this->public_certificate_list as $value) {
        if (!$value->isInitialized()) return 'public_certificate_list';
      }
      return null;
    }
    public function mergeFrom($x) {
      if ($x === $this) { throw new \IllegalArgumentException('Cannot copy message to itself'); }
      foreach ($x->getPublicCertificateListList() as $v) {
        $this->addPublicCertificateList()->copyFrom($v);
      }
      if ($x->hasMaxClientCacheTimeInSecond()) {
        $this->setMaxClientCacheTimeInSecond($x->getMaxClientCacheTimeInSecond());
      }
    }
    public function equals($x) {
      if ($x === $this) { return true; }
      if (sizeof($this->public_certificate_list) !== sizeof($x->public_certificate_list)) return false;
      foreach (array_map(null, $this->public_certificate_list, $x->public_certificate_list) as $v) {
        if (!$v[0]->equals($v[1])) return false;
      }
      if (isset($this->max_client_cache_time_in_second) !== isset($x->max_client_cache_time_in_second)) return false;
      if (isset($this->max_client_cache_time_in_second) && !$this->integerEquals($this->max_client_cache_time_in_second, $x->max_client_cache_time_in_second)) return false;
      return true;
    }
    public function shortDebugString($prefix = "") {
      $res = '';
      foreach ($this->public_certificate_list as $value) {
        $res .= $prefix . "public_certificate_list <\n" . $value->shortDebugString($prefix . "  ") . $prefix . ">\n";
      }
      if (isset($this->max_client_cache_time_in_second)) {
        $res .= $prefix . "max_client_cache_time_in_second: " . $this->debugFormatInt64($this->max_client_cache_time_in_second) . "\n";
      }
      return $res;
    }
  }
}
namespace google\appengine {
  class GetServiceAccountNameRequest extends \google\net\ProtocolMessage {
    public function clear() {
    }
    public function byteSizePartial() {
      $res = 0;
      return $res;
    }
    public function outputPartial($out) {
    }
    public function tryMerge($d) {
      while($d->avail() > 0) {
        $tt = $d->getVarInt32();
        switch ($tt) {
          case 0:
            throw new \google\net\ProtocolBufferDecodeError();
            break;
          default:
            $d->skipData($tt);
        }
      };
    }
    public function checkInitialized() {
      return null;
    }
    public function mergeFrom($x) {
      if ($x === $this) { throw new \IllegalArgumentException('Cannot copy message to itself'); }
    }
    public function equals($x) {
      if ($x === $this) { return true; }
      return true;
    }
    public function shortDebugString($prefix = "") {
      $res = '';
      return $res;
    }
  }
}
namespace google\appengine {
  class GetServiceAccountNameResponse extends \google\net\ProtocolMessage {
    public function getServiceAccountName() {
      if (!isset($this->service_account_name)) {
        return '';
      }
      return $this->service_account_name;
    }
    public function setServiceAccountName($val) {
      $this->service_account_name = $val;
      return $this;
    }
    public function clearServiceAccountName() {
      unset($this->service_account_name);
      return $this;
    }
    public function hasServiceAccountName() {
      return isset($this->service_account_name);
    }
    public function clear() {
      $this->clearServiceAccountName();
    }
    public function byteSizePartial() {
      $res = 0;
      if (isset($this->service_account_name)) {
        $res += 1;
        $res += $this->lengthString(strlen($this->service_account_name));
      }
      return $res;
    }
    public function outputPartial($out) {
      if (isset($this->service_account_name)) {
        $out->putVarInt32(10);
        $out->putPrefixedString($this->service_account_name);
      }
    }
    public function tryMerge($d) {
      while($d->avail() > 0) {
        $tt = $d->getVarInt32();
        switch ($tt) {
          case 10:
            $length = $d->getVarInt32();
            $this->setServiceAccountName(substr($d->buffer(), $d->pos(), $length));
            $d->skip($length);
            break;
          case 0:
            throw new \google\net\ProtocolBufferDecodeError();
            break;
          default:
            $d->skipData($tt);
        }
      };
    }
    public function checkInitialized() {
      return null;
    }
    public function mergeFrom($x) {
      if ($x === $this) { throw new \IllegalArgumentException('Cannot copy message to itself'); }
      if ($x->hasServiceAccountName()) {
        $this->setServiceAccountName($x->getServiceAccountName());
      }
    }
    public function equals($x) {
      if ($x === $this) { return true; }
      if (isset($this->service_account_name) !== isset($x->service_account_name)) return false;
      if (isset($this->service_account_name) && $this->service_account_name !== $x->service_account_name) return false;
      return true;
    }
    public function shortDebugString($prefix = "") {
      $res = '';
      if (isset($this->service_account_name)) {
        $res .= $prefix . "service_account_name: " . $this->debugFormatString($this->service_account_name) . "\n";
      }
      return $res;
    }
  }
}
namespace google\appengine {
  class GetAccessTokenRequest extends \google\net\ProtocolMessage {
    private $scope = array();
    public function getScopeSize() {
      return sizeof($this->scope);
    }
    public function getScopeList() {
      return $this->scope;
    }
    public function getScope($idx) {
      return $this->scope[$idx];
    }
    public function setScope($idx, $val) {
      $this->scope[$idx] = $val;
      return $this;
    }
    public function addScope($val) {
      $this->scope[] = $val;
      return $this;
    }
    public function clearScope() {
      $this->scope = array();
    }
    public function getServiceAccountId() {
      if (!isset($this->service_account_id)) {
        return "0";
      }
      return $this->service_account_id;
    }
    public function setServiceAccountId($val) {
      if (is_double($val)) {
        $this->service_account_id = sprintf('%0.0F', $val);
      } else {
        $this->service_account_id = $val;
      }
      return $this;
    }
    public function clearServiceAccountId() {
      unset($this->service_account_id);
      return $this;
    }
    public function hasServiceAccountId() {
      return isset($this->service_account_id);
    }
    public function clear() {
      $this->clearScope();
      $this->clearServiceAccountId();
    }
    public function byteSizePartial() {
      $res = 0;
      $this->checkProtoArray($this->scope);
      $res += 1 * sizeof($this->scope);
      foreach ($this->scope as $value) {
        $res += $this->lengthString(strlen($value));
      }
      if (isset($this->service_account_id)) {
        $res += 1;
        $res += $this->lengthVarInt64($this->service_account_id);
      }
      return $res;
    }
    public function outputPartial($out) {
      $this->checkProtoArray($this->scope);
      foreach ($this->scope as $value) {
        $out->putVarInt32(10);
        $out->putPrefixedString($value);
      }
      if (isset($this->service_account_id)) {
        $out->putVarInt32(16);
        $out->putVarInt64($this->service_account_id);
      }
    }
    public function tryMerge($d) {
      while($d->avail() > 0) {
        $tt = $d->getVarInt32();
        switch ($tt) {
          case 10:
            $length = $d->getVarInt32();
            $this->addScope(substr($d->buffer(), $d->pos(), $length));
            $d->skip($length);
            break;
          case 16:
            $this->setServiceAccountId($d->getVarInt64());
            break;
          case 0:
            throw new \google\net\ProtocolBufferDecodeError();
            break;
          default:
            $d->skipData($tt);
        }
      };
    }
    public function checkInitialized() {
      return null;
    }
    public function mergeFrom($x) {
      if ($x === $this) { throw new \IllegalArgumentException('Cannot copy message to itself'); }
      foreach ($x->getScopeList() as $v) {
        $this->addScope($v);
      }
      if ($x->hasServiceAccountId()) {
        $this->setServiceAccountId($x->getServiceAccountId());
      }
    }
    public function equals($x) {
      if ($x === $this) { return true; }
      if (sizeof($this->scope) !== sizeof($x->scope)) return false;
      foreach (array_map(null, $this->scope, $x->scope) as $v) {
        if ($v[0] !== $v[1]) return false;
      }
      if (isset($this->service_account_id) !== isset($x->service_account_id)) return false;
      if (isset($this->service_account_id) && !$this->integerEquals($this->service_account_id, $x->service_account_id)) return false;
      return true;
    }
    public function shortDebugString($prefix = "") {
      $res = '';
      foreach ($this->scope as $value) {
        $res .= $prefix . "scope: " . $this->debugFormatString($value) . "\n";
      }
      if (isset($this->service_account_id)) {
        $res .= $prefix . "service_account_id: " . $this->debugFormatInt64($this->service_account_id) . "\n";
      }
      return $res;
    }
  }
}
namespace google\appengine {
  class GetAccessTokenResponse extends \google\net\ProtocolMessage {
    public function getAccessToken() {
      if (!isset($this->access_token)) {
        return '';
      }
      return $this->access_token;
    }
    public function setAccessToken($val) {
      $this->access_token = $val;
      return $this;
    }
    public function clearAccessToken() {
      unset($this->access_token);
      return $this;
    }
    public function hasAccessToken() {
      return isset($this->access_token);
    }
    public function getExpirationTime() {
      if (!isset($this->expiration_time)) {
        return "0";
      }
      return $this->expiration_time;
    }
    public function setExpirationTime($val) {
      if (is_double($val)) {
        $this->expiration_time = sprintf('%0.0F', $val);
      } else {
        $this->expiration_time = $val;
      }
      return $this;
    }
    public function clearExpirationTime() {
      unset($this->expiration_time);
      return $this;
    }
    public function hasExpirationTime() {
      return isset($this->expiration_time);
    }
    public function clear() {
      $this->clearAccessToken();
      $this->clearExpirationTime();
    }
    public function byteSizePartial() {
      $res = 0;
      if (isset($this->access_token)) {
        $res += 1;
        $res += $this->lengthString(strlen($this->access_token));
      }
      if (isset($this->expiration_time)) {
        $res += 1;
        $res += $this->lengthVarInt64($this->expiration_time);
      }
      return $res;
    }
    public function outputPartial($out) {
      if (isset($this->access_token)) {
        $out->putVarInt32(10);
        $out->putPrefixedString($this->access_token);
      }
      if (isset($this->expiration_time)) {
        $out->putVarInt32(16);
        $out->putVarInt64($this->expiration_time);
      }
    }
    public function tryMerge($d) {
      while($d->avail() > 0) {
        $tt = $d->getVarInt32();
        switch ($tt) {
          case 10:
            $length = $d->getVarInt32();
            $this->setAccessToken(substr($d->buffer(), $d->pos(), $length));
            $d->skip($length);
            break;
          case 16:
            $this->setExpirationTime($d->getVarInt64());
            break;
          case 0:
            throw new \google\net\ProtocolBufferDecodeError();
            break;
          default:
            $d->skipData($tt);
        }
      };
    }
    public function checkInitialized() {
      return null;
    }
    public function mergeFrom($x) {
      if ($x === $this) { throw new \IllegalArgumentException('Cannot copy message to itself'); }
      if ($x->hasAccessToken()) {
        $this->setAccessToken($x->getAccessToken());
      }
      if ($x->hasExpirationTime()) {
        $this->setExpirationTime($x->getExpirationTime());
      }
    }
    public function equals($x) {
      if ($x === $this) { return true; }
      if (isset($this->access_token) !== isset($x->access_token)) return false;
      if (isset($this->access_token) && $this->access_token !== $x->access_token) return false;
      if (isset($this->expiration_time) !== isset($x->expiration_time)) return false;
      if (isset($this->expiration_time) && !$this->integerEquals($this->expiration_time, $x->expiration_time)) return false;
      return true;
    }
    public function shortDebugString($prefix = "") {
      $res = '';
      if (isset($this->access_token)) {
        $res .= $prefix . "access_token: " . $this->debugFormatString($this->access_token) . "\n";
      }
      if (isset($this->expiration_time)) {
        $res .= $prefix . "expiration_time: " . $this->debugFormatInt64($this->expiration_time) . "\n";
      }
      return $res;
    }
  }
}
